<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Additional;
use App\Models\Category;
use App\Models\Toggle;
use App\Models\User;
use App\Models\Order_product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ShowController extends Controller
{
  public function show()
  {

    $adde = Additional::all();
    $category = Category::all();
    $product = Product::where('category_id', 2)->get();


    return view('products.showBeer', compact('product', 'category', 'adde',));
  }

  public function shows()
  {
    $adde = Additional::all();
    $product = Product::where('category_id', 3)->get();

    return view('products.showCombo', compact('product', 'adde'));
  }

  public function index()
  {
    $users = Auth()->user()->id;
    $toggle = Toggle::first();
    $adde = Additional::all();
    $productCount = Order_product::where('user_id', $users)->with('orderProductProduct')->count();
    $products = Product::where('category_id', 2)->where('status', 0)->simplePaginate(10);
    return view('users.showBeer', compact('products', 'adde', 'toggle', 'productCount'));
  }

  public function combo()
  {
    $user      = Auth::user();
    $users     = $user->id;

    $toggle = Toggle::first();
    $adde = Additional::all();

    $productCount = Order_product::where('user_id', $users)->with('orderProductProduct')->count();
    $productCombo = Product::where('category_id', 3)->where('status', 0)->simplePaginate(10);

    return view('users.showCombo', compact('productCombo', 'adde', 'toggle', 'productCount'));
  }
}
