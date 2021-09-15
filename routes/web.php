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
    });

    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('admin.users.index');
    });
});

require __DIR__.'/auth.php';
