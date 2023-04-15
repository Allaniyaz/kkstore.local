<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', [WebController::class, 'home'])->name('shop.home');
Route::get('/shop-details', [WebController::class, 'shop_details'])->name('shop.details');
Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/shop-grid', [WebController::class, 'shop_grid'])->name('shop.grid');
Route::get('/shoping-cart', [WebController::class, 'shoping_cart'])->name('shop.cart');
Route::get('/main', [WebController::class, 'main'])->name('main');
Route::get('/blog-details', [WebController::class, 'blog_details'])->name('blog.details');
Route::get('/blog', [WebController::class, 'blog'])->name('blog.index');
Route::get('/checkout', [WebController::class, 'checkout'])->name('shop.checkout');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/welcome', [WebController::class, 'welcome'])->name('welcome');

Route::get('/cart', [CartController::class, 'getItems'])->name('cart.get');
Route::post('/cart/add', [CartController::class, 'addItem'])->name('cart.add');
Route::post('/cart/update/{item}', [CartController::class, 'updateItem'])->name('cart.update');
Route::post('/cart/remove/{item}', [CartController::class, 'removeItem'])->name('cart.remove');
