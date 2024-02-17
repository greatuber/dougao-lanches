<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderList;
use App\Models\Order_product;
use App\Models\LoyaltyPoint;
use App\Models\BlindCart;

class AdminController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $user      = Auth::user();
        $users       = $user->id;
        $product    = Order_product::where('user_id', $users)->get();
    
        if (Order_product::where('user_id', $users)->exists()) {
        } else {
          return redirect()->back()->with('menssagem', 'Vocẽ presisa relizar uma compra para conseguir enviar um pedido');
        }
       
       
    
        $payment  = $request->payment;
        $selectedCreditCard = $request->input('credit_card');
        $observation = $request->observation;
        $delivery = $request->delivery;
        $total    = $request->total;
        $user      = Auth::user();
        $users       = $user->id;
        $total      = str_replace(",", ".", $total);
        $product    = Order_product::where('user_id', $users)->get();
        $quantity = $product[0]->quanty;
    
          
        if ($total < 20.00) 
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
            
           $blindCart = $request->blindCartId;
         
         
          $blindCart = BlindCart::findOrFail($id);
          $blindCartId = $blindCart->id ?? '';
     
          $orderId = $order->id;
    
          // criando itens do pedido
    // dd($request->blindCartId);
          foreach ($product as $item) {
    
            $orderlist = OrderList::create([
              'blind_carts_id'=> $blindCartId ?? '',
              'order_id'      => $orderId,
              'product_id'    => $item->product_id,
              'observation'   => $item->observation,
              'quamtity'      => $item->quanty ?? 0,
              'value'         => $item->price ?? 0
            ]);
    
            $orderlist->orderAdditional()->attach($item->orderProductAdditional);
            
          }
        
        
          $orderPoints = Order::where('user_id', $users)->get();
    
          $totalPointsEarned = 0;
          
          foreach ($orderPoints as $order) {
            
              $totalPointsEarned += floor($order->total / 5) * 1;
          }
        
    
             //se existir pontos na tabela faz opdate no numero de pontos se não cria
          LoyaltyPoint::updateOrCreate(
              ['user_id' => $users],
              ['points_earned' => $totalPointsEarned ?? '']
          );
          
    
          $product = Order_product::where('user_id', $users)->delete();
          $blindCart = BlindCart::where('user_id', $users)->update(['status' => ('aceito')]);
        
    
    
          return redirect()->back()->with('sucessesmessagem', 'pedido enviado com sucesso');
        } else {
          return redirect()->back()->with('menssagem', 'Vocẽ presisa cadastrar um endereço');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
