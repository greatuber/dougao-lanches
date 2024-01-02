<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderList;
use App\Models\Order_product;
use App\Http\Requests\OrderProductRequest;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Collection;

class adminController extends Controller
{
    public function store(Request $request)
                        
            {         
              
              $user      = Auth::user();
              $users       = $user->id;
              $product    = Order_product::where('user_id',$users)->get();

              if (Order_product::where('user_id',$users)->exists()){
               
              }else{
                return redirect()->back()->with('menssagem','Vocẽ presisa relizar uma compra para conseguir enviar um pedido');
              }
              
                      $payment  = $request->payment;
                      $selectedCreditCard = $request->input('credit_card');
                      $observation = $request->observation; 
                      $delivery = $request->delivery;
                      $total    = $request->total;
                      $user      = Auth::user();
                      $users       = $user->id;
                      $total      = str_replace(",", ".",$total );
                      $product    = Order_product::where('user_id',$users)->get();
                      $quantity = $product[0]->quanty;

                     
                      // verificando se usuario tem endereço e depois criando pedido
                   
                    
                  if(Address::where('user_id',$users)->exists())
                      {

                            $total = ($delivery == 1 ? ($total+ 6) : $total);  
                          
                            $order = Order::create([
                              'observation' => $observation ?? $selectedCreditCard,
                              'payment'     =>  $payment,
                              'user_id'     => $user->id ?? '',
                              'total'       => $total,
                              'delivery'    => $delivery,
                              'quantity'    => $quantity,
                            ]);
          
                          
                            $orderId = $order->id;
                         
                             // criando itens do pedido

                            foreach($product as $item){
                            
                                $orderlist = OrderList::create([
                                'order_id'      => $orderId,
                                'product_id'    => $item->product_id,
                                'observation'   => $item->observation,
                                'quamtity'      => $item->quanty,
                                'value'         => $item->price,
                              ]);
                              $orderlist->orderAdditional()->attach($item->orderProductAdditional);
                           
                            }
                          
                          
                            $product = Order_product::where('user_id', $users)->delete();
                           
                           
          
                            return redirect()->back()->with('sucessesmessagem', 'pedido enviado com sucesso');

                            
                            
                      }else{
                           return redirect()->back()->with('menssagem','Vocẽ presisa cadastrar um endereço');
               
                          }
              
            }

               
        public function index(Request $request)
     
            {
           
                  $user      = Auth::user();
                  $users     = $user->id ?? '';

            
                   
                  $date = now()->format('d/m/y H:i:s');
   
              
                  $orders = Order::orderBY('id', 'desc')->with('orderUser','orderlist','orderAdditional')->where('status', 'processando')->get();
                
                    return view('cart.order',compact('date', 'users', 'orders'));
            }

        public function update(Request $request, $id)

             {
                  $order = Order::findOrFail($id);
            
                  $order->update(['status'=>('aceito')]);
                 

                  return redirect()->back();
             }      

}