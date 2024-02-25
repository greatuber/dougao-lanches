<?php

namespace App\Http\Controllers;

use App\Models\BlindCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LoyaltyPoint;
use App\Models\Order_product;
use App\Models\Order;

class BlindCartController extends Controller
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
       
        $users = Auth::user()->id;
        $name = $request->name;
        $points = $request->points;
        $blindCartId = $request->id;
     
        $orderPoints = Order::where('user_id', $users)->get();

        $totalPointsEarned = 0;

        // if ($orderPoints) 
        //     {
        //         foreach ($orderPoints as $order) {
        //             $totalPointsEarned += ($order->total / 5) * 1;
        //         }
        //             //se existir pontos na tabela faz opdate no numero de pontos se não cria
        //         LoyaltyPoint::updateOrCreate(
        //         ['user_id' => $users],
        //         ['points_earned' => $totalPointsEarned ?? '']
        //         );
        //     }
        
        $loyaut = LoyaltyPoint::where('user_id', $users)->get();

        if ($loyaut->isEmpty()) 
            {
                return redirect()->back()->with('denied', 'Você não possui pontos suficientes para resgatar este brinde');
            }

        
        $loyauts = $loyaut[0]->points_earned;

        if ($loyauts < $points) 
            {
                return redirect()->back()->with('denied','Você não possui pontos  para resgatar este blinde');
            }

        $blind = BlindCart::create([
            'user_id' => $users,
            'name'  => $name,
            'points' => $points,
            ]);
        if ($loyaut)
            {
                $loyaut[0]->update([
                    'points_earned' => $loyauts - $points
                ]); 
            }
          
        
    
         
          $blindCartId = $blind->id;
         
            
            $cart = Order_product::create([
                'blind_carts_id' => $blindCartId,
                'product_id' => $products ?? 0,
                'quanty' => $request->quanty ?? 0,
                'observation' => $request->observation ?? '',
                'user_id' => $users,
                'price' => $price ?? 0

            ]);
            
                return redirect()->back()->with('remuve', 'resgate de blinde solicitado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlindCart $blindCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlindCart $blindCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlindCart $blindCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlindCart $blindCart)
    {
        //
    }
}
