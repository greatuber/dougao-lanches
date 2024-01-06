<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class NewProjctsController extends Controller
{
  //

  public function show()

  {
    $category = Category::all();

    return view('products.create-project', compact('category'));
  }
}
