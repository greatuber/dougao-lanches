<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Toggle;

use Illuminate\Http\Request;

class panelAdminController extends Controller
{
  public function index()
  {
    $userCount = User::all()->count();

    $toggle = Toggle::first();
    
    return view('products.create',compact('userCount','toggle'));
  }
}
