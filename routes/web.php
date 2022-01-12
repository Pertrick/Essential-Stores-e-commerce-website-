<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/*Route::get('/', function () {
    $products = Product::latest()->take(3)->get();
    return view('user.index', compact('products'));
});
*/

//Home
Route::get('/', [HomeController::class, 'redirect']);

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('user.about');
Route::get('contact', [HomeController::class, 'contact'])->name('user.contact');
Route::get('search', [HomeController::class, 'search'])->name('user.search');

Route::get('all-products', [HomeController::class, 'showAllProducts'])->name('user.showAllProducts');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('user.cart');
Route::get('/add-to-cart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])
    ->name('user.addToCart');
Route::patch('update-cart', [\App\Http\Controllers\CartController::class, 'updateCart'])
    ->name('user.updateCart');
Route::delete('remove-from--cart', [\App\Http\Controllers\CartController::class, 'removeFromCart'])
    ->name('user.removeFromCart');


//Review
Route::get('/review/{id}/review', [\App\Http\Controllers\ReviewController::class, 'index'])
    ->name('user.review.index');
Route::post('/review/{id}/review', [\App\Http\Controllers\ReviewController::class, 'store'])
    ->name('user.review.store');
Route::delete('/review/{id}/review', [\App\Http\Controllers\ReviewController::class, 'destroy'])
    ->name('user.review.delete');

Route::group(['middleware' => ['auth']],function(){
    Route::get('products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])
        ->name('admin.product.index');

    Route::get('create-products', [\App\Http\Controllers\Admin\ProductController::class, 'create'])
        ->name('admin.product.create');
    Route::get('edit-products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])
        ->name('admin.product.edit');
    Route::post('store-products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])
        ->name('admin.product.store');

    Route::get('show-products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])
        ->name('admin.product.show');
    Route::put('update-products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])
        ->name('admin.product.update');
    Route::delete('delete-products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])
        ->name('admin.product.delete');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
