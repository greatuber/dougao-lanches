<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Order;
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

            $order = Order::where(['status' => ('aceito')])->get();
            return view('status.impress',compact('order', 'date'));
        
        }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
        {
           
            // $order = Order::findOrFail($id); // Certifique-se de que você está carregando o pedido corretamente
              

            // if(!$order)
            // {
            //    abort(404);
            // }
            $user      = Auth::user();
            $users       = $user->id;

            $date = now()->format('d/m/y H:i:s');

            $order = Order::where(['status' => ('aceito')])->get();
            $pdf = PDF::loadView('status.impress', compact('order', 'date'));
            
            return $pdf->setPaper('A4','landscape')->stream('imprimi');
            
            // return $pdf->download('nome_do_arquivo.pdf')


            // $order = Order::findOrFail($id);
         
           
            // if(!$order)
            //  {
            //     abort(404);
            //  }
                 
            
            //     $pdf = PDF::loadView('status.index', compact('order'));

            //     return $pdf->setPaper('A4','landscape')->stream('imprimi');
                // return $pdf->stream('imprimir');
                // return $pdf->download('imprimir');
          


            
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
