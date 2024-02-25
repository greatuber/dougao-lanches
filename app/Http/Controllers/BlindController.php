<?php

namespace App\Http\Controllers;

use App\Models\blind;
use App\Models\BlindCart;
use App\Models\LoyaltyPoint;
use App\Models\Order_product;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlindController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                $blinds = blind::where('status', 'pendente')->get();
                $blinds->load('blindUser');

                return view('blindAdmin.index',compact('blinds'));
    }

            /**
             * Show the form for creating a new resource.
             */
            public function create(Request $request, $id)
            {
            $user_id = Auth::user()->id;
            $name = $request->name;
            $points = $request->points;
        
            $loyaut = LoyaltyPoint::where('user_id', $user_id)->get();
            
            if ($loyaut->isEmpty()) 
                {
                    return redirect()->back()->with('denied', 'Você não possui pontos suficientes para resgatar este brinde');
                }

                
            $loyauts = $loyaut[0]->points_earned;

            if ($loyauts < $points) 
                {
                    return redirect()->back()->with('denied','Você não possui pontos  para resgatar este blinde');
                }

            
                blind::create([
                'user_id' => $user_id,
                'name'  => $name,
                'points' => $points,
                ]);

                $loyaut[0]->update([
                    'points_earned' => $loyauts - $points
                ]);

                return redirect()->back()->with('brind','resgate enviado com suceso');
            

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
    public function show(blind $blind)
    {
        $blinds = Blind::where('status', 'entregue')->get();

        return view('blindAdmin.show', compact('blinds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blind $blind)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $blinds = blind::findOrFail($id);
            $blinds->update(['status' => ('entregue')]);
            return redirect()->back()->with('entregue', 'blinde entregue');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blind $blind)
    {
        //
    }
}
