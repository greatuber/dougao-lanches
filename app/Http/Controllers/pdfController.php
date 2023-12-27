<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Order;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderList;

use Illuminate\Http\Request;

class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
        {

            $date = now()->format('d/m/y H:i:s');
            $user      = Auth::user();
            $users     = $user->id ?? '';
            $order = Order::all();
          

            
            //     $order = Order::with(['orderUser.address' => function ($query) {
            //     $query->latest('created_at')->limit(1); // Obtém o último endereço
            //    }])->where('status', 'aceito')->orderBy('id', 'desc')->get();


            $order = Order::orderBy('id', 'desc')->with('orderUser')->where(['status'=>('aceito')])->get();

            return view('status.impress',compact('order', 'date', 'users'));

         
        
        }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
        {
           

            $date = now()->format('d/m/y H:i:s');
            $user      = Auth::user();
            $users     = $user->id ?? '';
            $order = Order::all();
          

            $userAddresses = Address::where('user_id', $users)->with('userAdress')->get();

            $order = Order::orderBy('id', 'desc')->where(['status'=>('aceito')])->get();
          
  
            $pdf = PDF::loadView('status.impress', compact('order', 'date', 'userAddresses'));
            
            return $pdf->setPaper('A4','landscape')->stream('imprimi');
            
            // return $pdf->download('nome_do_arquivo.pdf')

          


            
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
