<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blind;
use App\Models\Point;
use App\Models\LoyaltyPoint;
use Illuminate\Support\Facades\Auth;

class DeliveryBlindController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $blinds = blind::where('status', 'pendente')->get();
        $blinds->load('blindUser');
        $points = LoyaltyPoint::where('user_id', $user_id)->get();
        $point = Point::all();

        return view('delivery.index',compact('blinds', 'points','point'));
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
    public function show()
    {
        $user_id = Auth::user()->id;
        $blinds = blind::where('status', 'pendente')->get();
        $blinds->load('blindUser');
        $points = LoyaltyPoint::where('user_id', $user_id)->get();
        $point = Point::all();

        return view('delivery.toremove',compact('blinds', 'point', 'points'));
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
