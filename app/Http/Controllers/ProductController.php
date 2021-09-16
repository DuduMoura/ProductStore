<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index() {
        $products = Product::latest()->paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $shops = Shop::all();
        return view('admin.products.create', compact('shops'));
    }

    public function store(ProductRequest $request) {

        $product = Product::create($request->all());

        if (!$product) {
            return redirect()
                ->back()
                ->with('message', 'Erro ao criar registro');
        } 
        
        return redirect()
        ->route('admin.products.index')
        ->with('message', 'Registro criado com sucesso');
    }

    public function edit(Product $product) {
        $shops = Shop::all();
        return view('admin.products.edit',[
            'product' => $product,
            'shops' => $shops,
        ]);
    }

    public function update(Product $product, ProductRequest $request) {
        if (!$product->update($request->all())) {
            return redirect()
            ->back()
            ->with('message', 'Erro ao atualizar registro');
        }

        return redirect()
        ->route('admin.products.index')
        ->with('message', 'Registro atualizado com sucesso');
    }

    public function destroy(Product $product) {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('message', 'Registro deletado com sucesso');
    }
}
