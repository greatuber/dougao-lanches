<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Additional;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Toggle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class bomboniereController extends Controller
{
   public function index()
   {
      $user = Auth::user();
      $users = $user->id;

      $toggle = Toggle::first();
      $productCount = Order_product::where('user_id', $users)->with('orderProductProduct')->count();
      $aditional = Additional::all();
      $order = Order::where('user_id', $users)->latest()->first();
      $product = Product::where('category_id', 4)->get();

      return view('products.showBomboniere', compact('aditional', 'order', 'product', 'toggle', 'product','productCount'));
   }

   public function show()
   {
      $user = Auth::user();
      $users = $user->id;

      $toggle = Toggle::first();

      $productCount = Order_product::where('user_id', $users)->with('orderProductProduct')->count();
      $order = Order::where('user_id', $users)->latest()->first();
      $productBombo = Product::where('category_id', 4)->where('status', 0)->simplePaginate(10);

      return view('users.showbomboniere', compact('order', 'productBombo', 'toggle', 'productCount'));
   }
}
