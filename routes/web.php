<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\HomeController;
use App\Http\Controllers\Backend\Brand\BrandController;
use App\Http\Controllers\Backend\Slider\SliderController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Attribute\AttributeController;
use App\Http\Controllers\Backend\Variation\VariationController;
use App\Http\Controllers\Backend\Local\SiteController;
use App\Http\Controllers\Backend\Language\LanguageChangeController;
use App\Http\Controllers\Backend\Language\LanguageController;
use App\Http\Controllers\Backend\Currency\CurrencyController;
use App\Http\Controllers\Backend\Local\LocaleController;
use App\Http\Controllers\Backend\Menu\MenuController;

use App\Http\Controllers\Frontend\Home\HomeController as Home;
use App\Http\Controllers\Frontend\ProductController as Product;
use App\Http\Controllers\Frontend\ProductByCategory;
use App\Http\Controllers\Frontend\SingleProductController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\LanguageSwitcher;
use App\Http\Controllers\Backend\Post\PostsController;
use App\Http\Controllers\Backend\page\PageController;
use App\Http\Controllers\Frontend\blog\BlogController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','site','usersite'])->group(function () {


//Route::get('/dashboardd', function () {
//    return view('Dashboard/Dashboard');
//})->middleware(['auth'])->name('Dashboard');
    Route::get('/Dashboard',[HomeController::class,'index'])->name('Dashboard');
    Route::resource('/brand', BrandController::class)->middleware('site');
    Route::resource('/slider', SliderController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/attribute', AttributeController::class);
    Route::post('/products/{id}', [ProductController::class,'update']);

    Route::resource('/lang', LanguageChangeController::class);
    Route::resource('/language', LanguageController::class);
    Route::resource('/currency', CurrencyController::class);
    Route::resource('/locale', LocaleController::class);
    Route::resource('/menu', MenuController::class);
    Route::post('/categori/{id}', [CategoryController::class,'update']);
    Route::post('demo/{id}', [CategoryController::class,'update']);
    Route::resource('/posts', PostsController::class);
    Route::post('/upload', [PostsController::class,'upload']);
    Route::resource('/pages', PageController::class);
    Route::post('/upload', [PageController::class,'upload']);
    Route::resource('/variation', VariationController::class);
    // Route::get('menu', function () {
    //     return view('backend/menu/index');
    // });
});
require __DIR__.'/auth.php';


Route::resource('/shop', Product::class);
Route::resource('/collection', ProductByCategory::class);
Route::resource('/single-product', SingleProductController::class);
Route::resource('/languages', LanguageSwitcher::class);
Route::get('/', [Home::class,'index'])->name('Home');
Route::resource('/cart', CartController::class);
Route::resource('/checkout', CheckoutController::class);
Route::resource('/blog',BlogController::class);
Route::get('/post/{slug}', [BlogController::class,'singlepost']);


Route::get('shope', function () {
    return view('frontend/order-complete/index');
});
Route::resource('/site', SiteController::class);
