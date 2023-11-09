<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Additional;
use App\Models\Category;
use App\Models\Toggle;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show()
       {
     
        $adde = Additional::all();
        $category = Category::all();
        $product = Product::where('category_id', 2)->get();
      

        return view ('products.showBeer',compact('product','category','adde',));
       }

     public function shows()
       {
        $adde = Additional::all();
        $product = Product::where('category_id',3)->get();

        return view('products.showCombo',compact('product','adde'));
       }  

     public function index()
        {
          $toggle = Toggle::first();
          $adde = Additional::all();
          $product = Product::where('category_id',2)->where('status', 0)->simplePaginate(10);
          return view('users.showBeer', compact('product','adde', 'toggle'));
        }  

    public function combo()
        {
          $toggle = Toggle::first();
          $adde = Additional::all();
          $product = Product::where('category_id', 3)->where('status', 0)->simplePaginate(10);

          return view('users.showCombo',compact('product','adde', 'toggle'));
        }    
}
