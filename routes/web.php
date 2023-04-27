<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TrademarkController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\LoginUserController;
use App\Http\Controllers\Admin\UserTypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::fallback(function () {
  return view('errors.404');
});

Route::get('admin/login', [LoginController::class, 'index'])->name('login');

Route::post('admin/login/store', [LoginController::class, 'store']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
  Route::prefix('admin')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('admin');
    Route::get('main', [MainController::class, 'index']);

    Route::get('/info', [UserController::class, 'showInfoAdmin'])->name('admin.info');

    #Menu
    Route::prefix('menus')->middleware('checkUserType')->group(function () {
      Route::get('add', [MenuController::class, 'create']);
      Route::post('add', [MenuController::class, 'store']);
      Route::get('list', [MenuController::class, 'index']);
      Route::get('edit/id={menu}', [MenuController::class, 'show']);
      Route::post('edit/id={menu}', [MenuController::class, 'update']);
      Route::delete('destroy', [MenuController::class, 'destroy']);
    });

    #Slider
    Route::prefix('sliders')->middleware('checkUserType')->group(function () {
      Route::get('add', [SliderController::class, 'create']);
      Route::post('add', [SliderController::class, 'store']);
      Route::get('list', [SliderController::class, 'index']);
      Route::get('edit/id={slider}', [SliderController::class, 'show']);
      Route::post('edit/id={slider}', [SliderController::class, 'update']);
      Route::delete('destroy', [SliderController::class, 'destroy']);
    });

    #User
    Route::prefix('users')->middleware('checkUserType')->group(function () {
      Route::get('add', [UserController::class, 'create']);
      Route::post('add', [UserController::class, 'store']);
      Route::get('list', [UserController::class, 'index']);
      Route::get('search', [UserController::class, 'search'])->name('admin.users.search');
      Route::get('edit/id={user}', [UserController::class, 'show']);
      Route::post('edit/id={user}', [UserController::class, 'update']);
      Route::delete('destroy', [UserController::class, 'destroy']);
    });

    #UserType
    Route::prefix('user_types')->middleware('checkUserType')->group(function () {
      Route::get('add', [UserTypeController::class, 'create']);
      Route::post('add', [UserTypeController::class, 'store']);
      Route::get('list', [UserTypeController::class, 'index']);
      Route::get('edit/id={user_type}', [UserTypeController::class, 'show']);
      Route::post('edit/id={user_type}', [UserTypeController::class, 'update']);
      Route::delete('destroy', [UserTypeController::class, 'destroy']);
    });

    #Trademark
    Route::prefix('trademarks')->group(function () {
      Route::get('add', [TrademarkController::class, 'create']);
      Route::post('add', [TrademarkController::class, 'store']);
      Route::get('list', [TrademarkController::class, 'index']);
      Route::get('search', [TrademarkController::class, 'search'])->name('admin.trademarks.search');
      Route::get('edit/id={trademark}', [TrademarkController::class, 'show']);
      Route::post('edit/id={trademark}', [TrademarkController::class, 'update']);
      Route::delete('destroy', [TrademarkController::class, 'destroy']);
    });

    #Promotion
    Route::prefix('promotions')->group(function () {
      Route::get('add', [PromotionController::class, 'create']);
      Route::post('add', [PromotionController::class, 'store']);
      Route::get('list', [PromotionController::class, 'index']);
      Route::get('edit/id={promotion}', [PromotionController::class, 'show']);
      Route::post('edit/id={promotion}', [PromotionController::class, 'update']);
      Route::delete('destroy', [PromotionController::class, 'destroy']);
    });

    #PromductType
    Route::prefix('product_types')->group(function () {
      Route::get('add', [ProductTypeController::class, 'create']);
      Route::post('add', [ProductTypeController::class, 'store']);
      Route::get('list', [ProductTypeController::class, 'index']);
      Route::get('search', [ProductTypeController::class, 'search'])->name('admin.producttypes.search');
      Route::get('edit/id={product_type}', [ProductTypeController::class, 'show']);
      Route::post('edit/id={product_type}', [ProductTypeController::class, 'update']);
      Route::delete('destroy', [ProductTypeController::class, 'destroy']);
    });

    #Product
    Route::prefix('products')->group(function () {
      Route::get('add', [ProductController::class, 'create']);
      Route::post('add', [ProductController::class, 'store']);
      Route::get('list', [ProductController::class, 'index']);
      Route::get('search', [ProductController::class, 'search'])->name('admin.products.search');
      Route::get('edit/id={product}', [ProductController::class, 'show']);
      Route::post('edit/id={product}', [ProductController::class, 'update']);
      Route::delete('destroy', [ProductController::class, 'destroy']);
    });
    
    #Upload
    Route::post('upload/services', [UploadController::class, 'store']);
  });
});

Route::get('/', [HomeController::class, 'index']);
Route::get('product', [ProductsController::class, 'index']);
Route::get('product/id={product}', [ProductsController::class, 'show']);
Route::get('/ajax-search-product', [HomeController::class, 'ajaxSearch'])->name('ajax-search-product');
Route::post('addcart', [CartController::class, 'index']);
Route::get('carts', [CartController::class, 'show']);
Route::delete('/carts/{product_id}', [CartController::class, 'delete']);
Route::delete('/carts/delete/all', [CartController::class, 'deleteALL']);
