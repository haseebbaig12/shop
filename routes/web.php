<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\HomeController;
use App\Http\Controllers\Backend\Brand\BrandController;
use App\Http\Controllers\Backend\Slider\SliderController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Attribute\AttributeController;
use App\Http\Controllers\Backend\Local\SiteController;
use App\Http\Controllers\Backend\Language\LanguageChangeController;
use App\Http\Controllers\Backend\Language\LanguageController;
use App\Http\Controllers\Backend\Currency\CurrencyController;
use App\Http\Controllers\Backend\Local\LocaleController;
use App\Http\Controllers\Frontend\Home\HomeController as Home;
use App\Http\Controllers\Frontend\ProductController as Product;
use App\Http\Controllers\Frontend\SingleProductController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CartController;
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
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['site'])->group(function () {


//Route::get('/dashboardd', function () {
//    return view('Dashboard/Dashboard');
//})->middleware(['auth'])->name('Dashboard');
    Route::get('/Dashboard',[HomeController::class,'index']);;
    Route::resource('/brand', BrandController::class);
    Route::resource('/slider', SliderController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/attribute', AttributeController::class);
    Route::post('/products/{id}', [ProductController::class,'update']);
    Route::resource('/site', SiteController::class);
    Route::resource('/lang', LanguageChangeController::class);
    Route::resource('/language', LanguageController::class);
    Route::resource('/currency', CurrencyController::class);
    Route::resource('/locale', LocaleController::class);
    Route::post('/categori/{id}', [CategoryController::class,'update']);
    Route::post('demo/{id}', [CategoryController::class,'update']);
});
require __DIR__.'/auth.php';


Route::resource('/shop', Product::class);
Route::resource('/single-product', SingleProductController::class);
Route::resource('/', Home::class);
Route::resource('/cart', CartController::class);
Route::resource('/checkout', CheckoutController::class);
