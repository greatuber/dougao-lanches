<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\categoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        $category = Category::get();

        return view('products.view-category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(categoryRequest $request)
    {
        $data = $request->all();
        $category = Category::create($data);
        return redirect()->back()->with('success', 'Categoria cadastrada com sucesso');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('deleted', 'categoria excluida com sucesso');
    }
}
