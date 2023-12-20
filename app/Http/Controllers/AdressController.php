<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;
use App\Models\Order_product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Requestadress;
use Illuminate\Http\Request;

class AdressController extends Controller
        {
        public function create(Requestadress  $request)
        {
            $cart = Order_product::all();
            $user = auth::user();
            $users = $user->id;

            $address = Address:: create([
                'city'          => $request->city,
                'district'      => $request->district,      
                'street'        => $request->street,
                'number'        => $request->number,
                'zipcode'       => $request->zipcode,
                'complement'    => $request->complement,
                'user_id'       => $users,
                'fone'          =>$request->fone,

            ]);

          
        
            return redirect()->route('cart.show',compact('user','cart'))
                             ->with('success','Endereço Cadastrado com sucesso');
        }

}
