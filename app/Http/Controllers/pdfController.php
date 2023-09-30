<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Models\OrderList;

use Illuminate\Http\Request;

class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
        {
        
        }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
        {
            // $order = Order::findOrFail($request->id)->first();
            $order = Order::where(['status'=>('aceito')])->with('orderUser')->get();

            $pdf = Pdf::loadView('status.index',compact('order'));

            return $pdf->setPaper('a4')->stream('imprimi');


            
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
