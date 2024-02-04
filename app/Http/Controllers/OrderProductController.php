<?php

namespace App\Http\Controllers;


use App\Models\Address;
use App\Models\BlindCart;
use App\Models\Order_product;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use function PHPSTORM_META\map;

class OrderProductController extends Controller
{
    public function store(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);
        $products = $product->id;
        $user = auth::user();
        $users = $user->id;
        $price = $product->price;

        
        // $blindCart = BlindCart::findOrFail($id);
        // $blindCartId = $blindCart->id ?? '';
        
        

        $cart = Order_product::create([
            'blind_carts_id' => $blindCartId ?? null,
            'product_id' => $products,
            'quanty' => $request->quanty,
            'observation' => $request->observation,
            'user_id' => $users,
            'price' => $price
        ]);

        $selectedAdditionals = $request->input('additional', []);
        //    dd($selectedAdditionals);
        foreach ($selectedAdditionals as $additionalId) {
            $cart->orderProductAdditional()->attach($additionalId);
        }


        $cart = Order_product::where('user_id', $users)
            ->with('orderProductProduct', 'orderProductAdditional')
            ->get();
        $blindCart = BlindCart::where('user_id', $users)->get();    

        return redirect()->back()->with('success', 'produto adicionado ao carrinho com sucesso');
    }

    public function storebeer(Request $request, $id)

    {
        $product = Product::findOrFail($id);
        $user = auth::user();
        $users = $user->id;
        $products = $product->id;
        $price =  $product->price;

        $cart = Order_product::create([
            'product_id' => $products,
            'quanty' => $request->quanty,
            'user_id' => $users,
            'price'   => $price ?? 0,
        ]);

        return view('cart.index', compact('cart', 'user'));
    }

    public function show(Request $request)
    {
        $product = Product::all();
        $user = Auth::user();
        $users = $user->id ?? '';

        $address = Address::where('user_id', $users)->with('userAdress')->latest()->first();

         $blindCart = BlindCart::where('user_id', $users)->where('status', 'pendente')->get();

        $cart = Order_product::where('user_id', $users)
            ->with('orderProductAdditional', 'orderProductProduct')
            ->get();

        $total = 0;

        $cart->each(function ($item) use (&$total) {
            $total += $item->orderProductProduct->price ?? 0 * $item->quanty;

            if ($item->orderProductAdditional) {
                // Se existirem adicionais, itera sobre a coleção
                $item->orderProductAdditional->each(function ($additional) use (&$total) {
                    $total += $additional->price;
                });
            }
        });

        return view('cart.index', compact('cart', 'address', 'total', 'users', 'blindCart'));
    }
    public function delete(Request $request, $id)
    {
        $product = Order_product::findOrFail($id);
        $product->delete();
        return redirect()->route('cart.show');
    }
}
