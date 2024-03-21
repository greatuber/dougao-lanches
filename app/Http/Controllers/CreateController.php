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
                $product = Product::where('category_id', 1)->get();

                return view('products.showLanche', compact('category', 'product'));
        }

        public function store(ProductRequest $request)

        {
            $imagePath = $request->file('image')->store('upload', 'public');
            $category = Category::all();
            $price = str_replace(',', '.', $request->price);

            $product = Product::create([
                'photo'         => $imagePath,
                'name'          => $request->name,
                'description'   => $request->description,
                'price'         => $price,
                'category_id'   => $request->category,

            ]);




                return redirect()->back()->with('success', 'produto cadastrado com suceeso!');
        }

        public function delete(Request $request, $id)
        {

                $product = Product::findOrFail($id);
                $product->delete();
                return redirect()->route('create.product')->with('delete', 'produto deletado com sucesso');
        }

        public function update(Request $request, $id)
        {
                $product = Product::findOrFail($id);

                $formatadPrice  = str_replace(',', '.', $request->price);

                $product->update(['price' => $formatadPrice] + $request->except('price') + $request->all());

                return redirect()->route('create.product')->with('update', 'produto atualizado com sucesso');
        }
}
