<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class panelAdminController extends Controller
{
    public function index()
      {
        return view('products.create');
      }
}
