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

    return view('products.aditional-view', compact('additional'));
  }

  public function create(additionalRequest $request)
  {

    $name = $request->name;

    $price = $request->price;


    $price  = str_replace(",",  ".", $price);

    $additional = Additional::create([
      'name' => $name,
      'price' => $price
    ]);

    return redirect()->back()->with('success',  'adicional cadastrado com sucesso');
  }

  public function destroy(Request $request, $id)
  {
    $additional = Additional::findOrFail($id);

    $additional->delete();
    return redirect()->back()->with('deleted', 'adicional excluido com sucesso');
  }

  public function update(Request $request, $id)
  {
    $additional = Additional::findOrFail($id);

    $formattedPrice = str_replace(',', '.', $request->input('price'));

    // Atualize o preço formatado
    $additional->update(['price' => $formattedPrice] + $request->except('price') + $request->all());

    return redirect()->back()->with('updated', ' atualizado com sucesso');
  }
}
