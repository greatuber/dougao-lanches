<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class panelAdminController extends Controller
{
  public function index()
  {
    $userCount = User::all()->count();
    
    return view('products.create',compact('userCount'));
  }
}
