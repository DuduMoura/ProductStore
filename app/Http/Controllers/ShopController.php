<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Http\Requests\ShopRequest;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $shops = Shop::latest()->paginate(5);
        return view('admin.shops.index', compact('shops'));
    }

    public function create() {
        return view('admin.shops.create');
    }

    public function store(ShopRequest $request) {

        if (!Shop::create($request->all())) {
            return redirect()
                ->back()
                ->with('message', 'Erro ao criar registro');
        } 
        
        return redirect()
        ->route('admin.shops.index')
        ->with('message', 'Registro criado com sucesso');
    }

    public function edit(Shop $shop) {
        return view('admin.shops.edit',[
            'shop' => $shop
        ]);
    }

    public function update(Shop $shop, ShopRequest $request) {
        if (!$shop->update($request->all())) {
            return redirect()
            ->back()
            ->with('message', 'Erro ao atualizar registro');
        }

        return redirect()
        ->route('admin.shops.index')
        ->with('message', 'Registro atualizado com sucesso');
    }

    public function destroy(Shop $shop) {
        $shop->delete();

        return redirect()
            ->route('admin.shops.index')
            ->with('message', 'Registro deletado com sucesso');
    }
}
