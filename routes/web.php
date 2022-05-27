<?php

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
    return view('welcome');
})->name('home');

Auth::routes([
    'verify' => true,
]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

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
