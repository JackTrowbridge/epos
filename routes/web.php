<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    $products = Product::with('categories')->limit(10)->get();

    return Inertia::render('Home', [
        'products' => $products,
    ]);
});
