<?php

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

use \Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;


//проект
Route::get('/', ['as' => 'main', 'uses' => 'IndexController@show']);
Route::get('/about', ['uses' => 'PagesController@about', 'as' => 'about']);
Route::get('/feedback', ['uses' => 'PagesController@feedback', 'as' => 'feedback']);
Route::post('/feedback', ['uses' => 'PagesController@feedbackSend', 'as' => 'feedback.send']);


// авторизация
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//админка по интернет-магазину
Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['auth','can:isAdmin']
    ],
    function () {

        Route::get(
            '/',
            function () {
                return redirect()->route('admin.products.index');
            }
        )->name('home');

        //товары
        Route::resource('/products', 'Admin\ProductsController');
        Route::get('/products/{product}', 'Admin\ProductsController@destroy')->name('products.destroy');
        //категории
        Route::resource('/categories', 'Admin\CategoryController');
        Route::get('/categories/{category}', 'Admin\CategoryController@destroy')->name('categories.destroy');
        //новости
        Route::resource('/news', 'Admin\NewsController');
        Route::get('/news/{news}', 'Admin\NewsController@destroy')->name('news.destroy');

    }
);

Route::group(
    [
        'prefix' => 'shop',
        'as' => 'shop.',
    ],
    function () {
        Route::get('/category/{category}', 'ShopController@categoryDetailPage')->name('category.detail');
        Route::get('/category/{category}/{product}', 'ShopController@productDetailPage')->name('product.detail');
        Route::post('/addToCart/{product?}', 'ShopController@addToCard')->name('product.add_to_cart');
        Route::get('/cart', 'ShopController@cart')->name('cart');
        Route::get('/cart/delete/{cartItemKey}', 'ShopController@cartDelete')->name('cart.delete');
       //аутентификация (проверка прав доступа)
        Route::post('/createOrder', 'ShopController@createOrder')->name('order.create')->middleware('auth');
        Route::get('/orders', 'ShopController@orders')->name('orders')->middleware('auth');
        Route::get('/orders/{order?}', 'ShopController@orderDetail')->name('order.detail')->middleware('auth');
    }
);

Route::group(
    [
        'prefix' => 'news',
    ],
    function () {
        Route::get('/', 'NewsController@index')->name('news.list');
        Route::get('/{news}', 'NewsController@detail')->name('news.detail');
    }
);

