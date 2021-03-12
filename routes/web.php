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
use App\Http\Controllers\Frontend\HomeController as frontend;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {


//Route::get('/dashboardd', function () {
//    return view('Dashboard/Dashboard');
//})->middleware(['auth'])->name('Dashboard');
    Route::get('/Dashboard',[HomeController::class,'index'])->middleware('site');;
    Route::resource('/brand', BrandController::class)->middleware('site');
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
