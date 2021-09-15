<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard.index');

    Route::prefix('products')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('admin.products.index');
    });

    Route::prefix('shops')->group(function () {
        Route::get('', [ShopController::class, 'index'])->name('admin.shops.index');
        Route::post('', [ShopController::class, 'store'])->name('admin.shops.store');
        Route::get('edit/{shop}', [ShopController::class, 'edit'])->name('admin.shops.edit');
        Route::put('edit/{shop}', [ShopController::class, 'update'])->name('admin.shops.update');
        Route::get('create', [ShopController::class, 'create'])->name('admin.shops.create');
        Route::delete('{shop}', [ShopController::class, 'destroy'])->name('admin.shops.destroy');
    });

    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('admin.users.index');
    });
});

require __DIR__.'/auth.php';
