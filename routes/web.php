<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\User;
use App\Http\Livewire\Admin;
use App\Http\Livewire\Post\Product;
use App\Http\Livewire\Post\ProductDetail;
use App\Http\Livewire\Post\ProductCategory;
use App\Http\Livewire\Cart\CartDetail;
use App\Http\Livewire\Checkout\Checkout;
use App\Http\Livewire\Checkout\CheckoutFinish;


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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', Home::class);
Route::get('/products', Product::class);
Route::get('/products/{id}', ProductDetail::class);
Route::get('/products/category/{categoryId}', ProductCategory::class);
Route::get('/products/category/{categoryId}', ProductCategory::class);
Route::get('/cart', CartDetail::class);


Route::group(['middleware' => 'auth'], function(){
    Route::get('/checkout', Checkout::class);
    Route::get('/checkout/finish', CheckoutFinish::class);
    Route::get('/user', User::class);
});
Route::group(['middleware' => 'isadmin'], function(){
    Route::get('/admin', Admin::class);
});



Auth::routes();

// Route::get('/admin', ['middleware' => 'isadmin', function () {
//     return view('manage');
// }]);
// Route::get('/user', ['middleware' => 'auth', function () {
//     return view('user');
// }]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
