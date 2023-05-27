<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
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

//Home
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('user.about');
Route::get('contact', [ContactController::class, 'index'])->name('user.contact');
Route::post('contact', [ContactController::class, 'contactUsForm'])->name('user.contact.save');
Route::get('s', [HomeController::class, 'search'])->name('user.search');
Route::get('searches', [HomeController::class, 'searchAllProducts'])->name('user.searchAllProducts');

Route::get('all-products', [HomeController::class, 'showAllProducts'])->name('user.showAllProducts');

Route::get('/cart', [CartController::class, 'index'])->name('user.cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.product.store');
Route::patch('update-cart', [CartController::class, 'updateCart'])->name('user.updateCart');
Route::delete('remove-from--cart', [CartController::class, 'removeFromCart'])->name('user.removeFromCart');

Route::get('product-modal/{id}', [HomeController::class, 'modal'])->name('user.modal.show');

//Payment controller
Route::get('payment', [PaymentController::class, 'index'])->name('user.payment.show');
Route::get('verify-payment/{reference_id}', [PaymentController::class, 'verify'])->name('user.payment.verify');
Route::get('/confirm', [PaymentController::class, 'successfulPayment'])->name('user.payment.confimed');

//Review
Route::get('/review/{product:uuid}/review', [ReviewController::class, 'index'])->name('user.review.index');
Route::post('/review/{id}/review', [ReviewController::class, 'store'])->name('user.review.store');
Route::delete('/review/{id}/review', [ReviewController::class, 'destroy'])->name('user.review.delete');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    // Route::get('products', [ProductController::class, 'index'])->name('admin.product.index');
    // Route::get('create-products', [ProductController::class, 'create'])->name('admin.product.create');
    // Route::get('edit-products/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    // Route::post('store-products', [ProductController::class, 'store'])->name('admin.product.store');

    // Route::get('show-products/{id}', [ProductController::class, 'show'])->name('admin.product.show');
    // Route::put('update-products/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    // Route::delete('delete-products/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    // Route::get('users', [UserController::class, 'index'])->name('admin.user.index');

    // Route::post('assign-users', [UserController::class, 'assignRoles'])->name('admin.user.assignroles');

    // Route::get('categories', [CategoryController::class, 'index'])->name('admin.category.index');
    // Route::get('create-products', [CategoryController::class, 'create'])->name('admin.category.create');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

