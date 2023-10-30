<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CreateController extends Controller
{
  public function index()

            {
                    $category = Category::all();
                    $product = Product::where('category_id',1)->get();
                
                    return view('products.create',compact('category','product'));

            }

    public function store(ProductRequest $request )
      
            {
                    $category = Category::all();
                    $product = Product::create
                    ([
                        'name'          => $request->name,
                        'description'   => $request->description,
                        'price'         => $request->price,
                        'category_id'  =>$request->category,
                    ]);

                    $product = Product::all();
                    return redirect()->route('create.product',compact('product','category'))->with('success','produto cadastrado com suceeso!');    
            }

    public function delete(Request $request,$id)
            {
                   
                    $product = Product::findOrFail($id);
                    $product->delete();
                    return redirect()->route('create.product');
            }

    public function update(Request $request, $id)
           {
                    $product = Product::findOrFail($request->id)->update($request->all());

                

                    return redirect()->route('create.product');
           }   
}
