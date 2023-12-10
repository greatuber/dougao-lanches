<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\additionalRequest;
use App\Models\Additional;

class AditionalController extends Controller
{
    public function index()

        {
          $additional = Additional::get();

          return view('products.aditional-view',compact('additional'));
        }

     public function create(additionalRequest $request)
        {
          $data = $request->all();

          $additional = Additional::create($data);
          
          return redirect()->back()->with('success',  'adicional cadastrado com sucesso');
        }
        
     public function destroy(Request $request, $id)
       {
        $additional = Additional::findOrFail($id);

        $additional->delete();
        return redirect()->back()->with('deleted', 'adicional excluido com sucesso');
       }   
}
