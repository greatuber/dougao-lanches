<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoyaltyPoint;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
class pointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user      = Auth::user()->id;
        $points = LoyaltyPoint::where('user_id', $user)->get();
        $point = Point::all();

        return view('points.index', compact('points', 'point'));
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
       $imagePath = $request->file('image')->store('upload', 'public');
       $name = $request->name;
       $points = $request->points;
       Point::create([
        'image' => $imagePath,
        'name'  => $name,
        'points' => $points
       ]);
       return redirect()->back()->with('create', 'blinde criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $points = Point::all();
        return view('points.create', compact('points'));
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
    public function destroy( $id)
    {

        // dd('aqui');
        $points = Point::findOrFail($id);

        $points->delete();

        return redirect()->back()->with('success', 'item deletado com sucesso!');

    }
}
