<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductStatusController extends Controller
{
    public function update(Request $request, $id)
     {
        $product = Product::findOrFail($id);
        
        if ($product->status == 0) {
         $product->status = 1;

         $product->save();
        } else {
         $product->status = 0;

         $product->save();
        }
    
        return redirect()->back();
     
     }
}
