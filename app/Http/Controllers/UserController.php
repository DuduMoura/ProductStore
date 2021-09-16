<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

class UserController extends Controller
{
    public function index() {
        $users = User::latest()->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        $shops = Shop::all();
        return view('admin.users.create', compact('shops'));
    }

    public function store(RegisterRequest $request) {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'shops_id' => $request->shops_id ?? NULL,
        ]);

        if (!$user) {
            return redirect()
                ->back()
                ->with('message', 'Erro ao criar registro');
        } 
        
        return redirect()
        ->route('admin.users.index')
        ->with('message', 'Registro criado com sucesso');
    }

    public function edit(User $user) {
        $shops = Shop::all();
        return view('admin.users.edit',[
            'user' => $user,
            'shops' => $shops,
        ]);
    }

    public function update(User $user, UserRequest $request) {

        $updateReturn = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'shops_id' => $request->shops_id ?? NULL,
        ]);

        if ($request->password) {
            $updateReturn = $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
                
        if (!$updateReturn) {
            return redirect()
            ->back()
            ->with('message', 'Erro ao atualizar registro');
        }

        return redirect()
        ->route('admin.users.index')
        ->with('message', 'Registro atualizado com sucesso');
    }

    public function destroy(User $user) {
        $user->delete();

        if (Auth::user() == $user) {
            Auth::guard('web')->logout();
            return redirect('/');
        }

        return redirect()
            ->route('admin.users.index')
            ->with('message', 'Registro deletado com sucesso');
    }
}
