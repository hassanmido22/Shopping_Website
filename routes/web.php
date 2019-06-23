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
//Display views
Route::get('/', 'home@hom')->name('Home');
Route::get('/shop/', 'ShopController@index')->name('Shop');
Route::get('/shop-single/{id}','productcontroller@single_one')->name('shop-single');
Route::get('/category/{id}', 'ShopController@category');
Route::get('/cart/', function () {
    return view('cart');
})->name('cart.index');
Route::get('/thankyou/', function () {
    return view('thankyou');
})->name('thankyou');
Auth::routes();
Route::get('/search','ShopController@search');
Route::get('/contact/', function () { 
    return view('contact');
})->name('contact');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart/', function () {
    return view('cart');
});
//
Route::get('/New_Arrivals/','newarrivals_controller@ViewProduct')->name('newarrivals');
Route::post('/addtowhitelist/','whitelist_controller@addtowhitelist');
Route::get('/profile/','whitelist_controller@profile_fun');
Route::get('/whitelist/','whitelist_controller@displaywhitelist')->name('whitelist');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//cart
Route::get('/cart','CartController@index')->name('cart');
Route::Post('/cart/create','CartController@store');
Route::get('/destroy/', 'CartController@destroy');
Route::get('/delete/{id}','CartController@remove');
Route::post('/cart/','CartController@updatequantity');
Route::post('/shop/filterd', 'ShopController@amount');
Route::post('/shop','SendEmailController@send');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//orders Routs
Route::get('/orders/','orderscontroller@displayorders' );
Route::post('/addorder/','orderscontroller@addorder');
Route::get('/order/{id}', 'orderscontroller@orderdetails'  );
//checkout
Route::get('/checkout/', 'checkoutcontroller@checkout');
Route::post('/checkoutstore/', 'checkoutcontroller@store');

Route::get('/sendemail','SendEmailController@index');
Route::get('/online-shops','HomeController@getcrawler')->name('crawler');
