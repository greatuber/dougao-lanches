<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class productionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = now()->format('d/m/y H:i:s');
        $user      = Auth::user();
        $users     = $user->id ?? '';
        $order = Order::all();


        $userAddresses = Address::where('user_id', $users)->with('userAdress')->get();

        $order = Order::orderBy('id', 'desc')->where(['status' => ('produção')])->get();

        return view('status.production', compact('userAddresses', 'order'));
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
        $order->update(['status' => ('saiu para entrega')]);

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
