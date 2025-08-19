<?php

use Illuminate\Support\Facades\Route;



// Dummy index
Route::get('/products', function () {
    $products = [
        (object)['id' => 1, 'name' => 'Dummy Produk A', 'stock' => 10],
        (object)['id' => 2, 'name' => 'Dummy Produk B', 'stock' => 5],
        (object)['id' => 3, 'name' => 'Dummy Produk C', 'stock' => 20],
    ];

    return view('products.index', compact('products'));
})->name('products.index');

// Dummy create
Route::get('/products/create', function () {
    return view('products.create');
})->name('products.create');

// Dummy edit
Route::get('/products/{id}/edit', function ($id) {
    $product = (object)['id' => $id, 'name' => "Dummy Produk $id", 'stock' => 15];
    return view('products.edit', compact('product'));
})->name('products.edit');

// Dummy store
Route::post('/products', function (\Illuminate\Http\Request $request) {
    return redirect()->route('products.index')->with('success', 'Produk dummy berhasil ditambah');
})->name('products.store');

// Dummy update
Route::put('/products/{id}', function (\Illuminate\Http\Request $request, $id) {
    return redirect()->route('products.index')->with('success', "Produk $id dummy berhasil diupdate");
})->name('products.update');

// Dummy destroy
Route::delete('/products/{id}', function ($id) {
    return redirect()->route('products.index')->with('success', "Produk $id dummy berhasil dihapus");
})->name('products.destroy');
