<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Additional;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class bomboniereController extends Controller
{
    public function index()
       {
         $user = Auth::user();
         $users = $user->id;


          $aditional = Additional::all();
          $order = Order::where('user_id', $users)->latest()->first();
          $product = Product::where('category_id', 4)->get();

          return view('products.showBomboniere', compact('aditional', 'order', 'product'));
       }

    public function show()
      {
         $user = Auth::user();
         $users = $user->id;

         $order = Order::where('user_id', $users)->latest()->first();
         $product = Product::where('category_id', 4)->where('status', 0)->simplePaginate(10);

         return view('users.showbomboniere', compact('order', 'product'));
      }   
}
