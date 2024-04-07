<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderList;
use App\Models\Order_product;
use App\Models\LoyaltyPoint;
use App\Models\blind;
use App\Models\BlindCart;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class adminController extends Controller
{
  public function store(Request $request)

  {

    $user      = Auth::user();
    $users       = $user->id;
    $product    = Order_product::where('user_id', $users)->get();

    if (Order_product::where('user_id', $users)->exists()) {
    } else {
      return redirect()->back()->with('menssagem', 'Vocẽ presisa relizar uma compra para conseguir enviar um pedido !');
    }



    $payment  = $request->payment;
    $selectedCreditCard = $request->input('credit_card');
    $observation = $request->observation;
    $delivery  = $request->delivery;
    $total     = $request->total;
    $user      = Auth::user();
    $users     =$user->id;
    $total      = str_replace(",", ".", $total);
    $product    = Order_product::where('user_id', $users)->get();
    $quantity   = $product[0]->quanty;
    $blindCartIds = $request->input('blindCartId');






    if ( $total < 20.00)
    {
     return redirect()->back()->with('total', 'o valor de sua compra precisa ser maior que 20,00 reais');
    }

    // verificando se usuario tem endereço e depois criando pedido


    if (Address::where('user_id', $users)->exists()) {

      $total = ($delivery == 1 ? ($total + 6) : $total);

      $order = Order::create([
        'observation' => $observation ?? $selectedCreditCard,
        'payment'     =>  $payment,
        'user_id'     => $user->id ?? '',
        'total'       => $total,
        'delivery'    => $delivery,
        'quantity'    => $quantity ?? 0,
      ]);



      $orderId = $order->id;

      // criando itens do pedido

      foreach ($product as $item) {

        $orderlist = OrderList::create([
          'blind_carts_id'=> $blindCartIds  ?? null,
          'order_id'      => $orderId,
          'product_id'    => $item->product_id ?? '',
          'observation'   => $item->observation,
          'quamtity'      => $item->quanty ?? 0,
          'value'         => $item->price ?? 0
        ]);

        $orderlist->orderAdditional()->attach($item->orderProductAdditional);

      }

       //buscar todos os pedidos do usuario e somar

      $orderPoints = Order::where('user_id', $users)->get();


      $totalOrderAmount = 0;

      foreach ($orderPoints as $order) {
        $totalOrderAmount += $order->total;

      }
          //buscar todos os blindes que o usuario já resgatou



         //transformando total gasto em pontos

      $totalPointsEarned = floor($totalOrderAmount / 50) * 5;



      $totalBlindPointsCart  = BlindCart::where('user_id', $users)->sum('points');

      $totalBlindPointsDirect = blind::where('user_id', $users)->sum('points');

      // Somar pontos dos dois tipos de resgate
      $totalBlindPoints = $totalBlindPointsCart + $totalBlindPointsDirect;

      //subtrair pontos resgatados do total de pontos
      $totalPointsEarned -= $totalBlindPoints;





         //se existir pontos na tabela faz opdate no numero de pontos se não cria

      LoyaltyPoint::updateOrCreate(
          ['user_id' => $users],
          ['points_earned' =>   $totalPointsEarned ?? '']
      );




      $product = Order_product::where('user_id', $users)->delete();

        //enviar mensagens via gzappy
    // Dados da mensagem e credenciais da instância
    $data = [
      "instance_id" => "BA4B88RMNQQZE9SA7ZMEEZT5",
      "instance_token" => "3ed00a88-733d-4b1a-bbec-6fe1d4a7d22e",
      "message" => ["novo pedido verifique seu painel admin"],
      "phone" => ["5535998464219"]
  ];


  $response = Http::withHeaders([
      'Content-Type' => 'application/json',
      'user_token_id' => 'd68f5c6e-3def-4273-b368-79144c0214ab',
  ])->post('https://api.gzappy.com/v1/message/send-message', $data);

  // Verifica se a resposta foi bem-sucedida
//   if ($response->successful()) {
//       // Mensagem enviada com sucesso
//       return response()->json(['message' => 'Mensagem enviada com sucesso']);
//   } else {
//       // Falha ao enviar a mensagem
//       return response()->json(['error' => 'Falha ao enviar mensagem'], $response->status());
//   }


          // Envie uma mensagem para o admin do sistema
        //   $sid = env('TWILIO_SID');
        //   $token = env('TWILIO_AUTH_TOKEN');
        //   $twilio = new Client($sid, $token);

        // $adminPhoneNumber = "+5535998464219";


        // $message = $twilio->messages
        //     ->create("whatsapp:{$adminPhoneNumber}",
        //         array(
        //             "from" => "whatsapp:+14155238886",
        //             "body" => "Novo pedido recebido. Verifique o painel de administração para detalhes."
        //         )
        //     );


      return redirect()->back()->with('new_order', true)->with('successmessage', 'Pedido enviado com sucesso, tempo de espera para acitação em média 12 minutos!.');


} else {
    // Redirecionar de volta com mensagem de erro

    return redirect()->back()->with('mensagem', 'Você precisa cadastrar um endereço.');
}
}





  public function index(Request $request)

      {

        // $newOrder = session('new_order', true);
        $newOrder = true;
        $user      = Auth::user();
        $userId     = $user->id ?? '';

        $date = now()->format('d/m/y H:i:s');

        $orders = Order::orderBY('id', 'desc')
          ->with('orderUser', 'orderlist', 'orderAdditional')
          ->where('status', 'processando')
          ->get();

          $lists = OrderList::with('blindCart')->first();

        return view('cart.order', compact('date', 'userId', 'orders', 'lists', 'newOrder'));
      }

  public function update(Request $request, $id)

      {
        $order = Order::findOrFail($id);

        $order->update(['status' => ('aceito')]);

     

        // $blindCartId = BlindCart::findOrFail($blindCartId);

        // $blindCartId->update(['status' => ('impresso')]);


        return redirect()->back();
      }
}
