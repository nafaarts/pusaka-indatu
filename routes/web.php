<?php

use App\Http\Controllers\HomeController;
use App\Models\Blog;
use App\Models\Food;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::latest()->get();
    $kuliner = Food::latest()->get();
    return view('home', compact('products', 'kuliner'));
})->name('home');

Route::get('/produk', function () {
    $products = Product::latest()->get();
    return view('produk', compact('products'));
})->name('produk');

Route::get('/kuliner', function () {
    $kuliner = Food::latest()->get();
    return view('kuliner', compact('kuliner'));
})->name('kuliner');

Route::get('/artikel', function () {
    $artikel = Blog::latest()->get();
    return view('artikel', compact('artikel'));
})->name('artikel');

Route::get('/artikel/{blog:slug}', function (Blog $blog) {
    return view('artikel-baca', compact('blog'));
})->name('artikel.baca');

Auth::routes([
    'verify' => true,
]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('artikel', App\Http\Controllers\BlogController::class)
            ->parameters(['artikel' => 'blog'])
            ->names('blog')
            ->except(['show']);

        Route::resource('produk', App\Http\Controllers\ProductController::class)
            ->parameters(['produk' => 'product'])
            ->names('products')
            ->except(['show']);

        Route::resource('makanan', App\Http\Controllers\FoodController::class)
            ->parameters(['makanan' => 'food'])
            ->names('foods')
            ->except(['show']);

        Route::resource('manajemen-admin', App\Http\Controllers\AdminController::class)
            ->parameters(['manajemen-admin' => 'admin'])
            ->names('admin-management')
            ->except(['show']);
    });
});
