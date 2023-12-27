<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class statusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
            {
             
            
                $date = now()->format('d/m/y H:i:s');
                $user      = Auth::user();
                $users     = $user->id ?? '';
          
                // $orders = Order::with(['orderUser.address' => function ($query) {
                //     $query->latest('created_at')->limit(1); // Obtém o último endereço
                //    }])->where('status', 'aceito')->orderBy('id', 'desc')->get();

                $orders = Order::orderBY('id', 'desc')->with('orderUser')->where('status', 'aceito')->get();
            

                return view('status.index',compact('orders', 'date', 'users'));
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
    public function store(Request $request)
    {
        //
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
        $order = Order::findOrFail($id);

        $order->update(['status'=>('produção')]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
