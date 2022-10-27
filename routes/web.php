<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Gloudemans\Shoppingcart\Facades\Cart;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/A-propos', [AboutController::class, 'index'])->name('Apropos');

Route::get('/produit', [ProductController::class, 'index'])->name('products');
Route::get('/produit/{product}', [ProductController::class, 'show'])->name('products.show');


Route::get('/creation', [CreationController::class, 'index'])->name('create');
Route::get('/creation/{creation}', [CreationController::class, 'show'])->name('creations.show');

Route::get('/devis', [DevisController::class, 'index'])->name('devis');

Route::get('/mon-panier', [CartController::class, 'index'])->middleware(['auth'])->name('cart');
Route::post('/panier/ajouter', [CartController::class, 'store'])->middleware(['auth'])->name('cart.store');
Route::delete('/panier/{rowid}', [CartController::class, 'destroy'])->middleware(['auth'])->name('cart.destroy');
Route::get('/videpanier', function () {
    Cart::destroy();
});


Route::get('/paiement', [CheckoutController::class, 'index'])->middleware(['auth'])->name('checkout.index');
Route::post('/paiement', [CheckoutController::class, 'store'])->middleware(['auth'])->name('checkout.store');
Route::get('/merci', function() {
    return view('checkout.thankyou');
});



Route::get('/user/{user}', [UserController::class, 'index'])->middleware(['auth'])->name('user');
Route::put('/user/{user}', [UserController::class, 'update']);


Route::get('/admin', [AdminController::class, 'index'])->middleware(['admin'])->name('admin');

Route::get('/admin/produit', [AdminController::class, 'show'])->middleware(['admin'])->name('admin.show');
Route::get('/admin/produit/create', [AdminController::class, 'create'])->middleware(['admin'])->name('admin.create');
Route::post('/admin/produit/create', [AdminController::class, 'store']);
Route::get('/admin/produit/{product}/update', [AdminController::class, 'edit'])->middleware(['admin'])->name('admin.edit');
Route::put('/admin/produit/{product}/update', [AdminController::class, 'update']);
Route::delete('/admin/produit/{product}', [AdminController::class, 'destroy'])->middleware(['admin'])->name('admin.destroy');


Route::get('/admin/creation', [AdminController::class, 'creationshow'])->middleware(['admin'])->name('admin.creationshow');
Route::get('/admin/creation/create', [AdminController::class, 'creationcreate'])->middleware(['admin'])->name('admin.creationcreate');
Route::post('/admin/creation/create', [AdminController::class, 'creationstore']);
Route::get('/admin/creation/{creation}/update', [AdminController::class, 'creationedit'])->middleware(['admin'])->name('admin.creationedit');
Route::put('/admin/creation/{creation}/update', [AdminController::class, 'creationupdate']);
Route::delete('/admin/creation/{creation}', [AdminController::class, 'creationdestroy'])->middleware(['admin'])->name('admin.creationdestroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
