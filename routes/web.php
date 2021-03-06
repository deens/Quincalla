<?php

// Homepage
Route::get('/', 'HomeController@index');

// Authentication.
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Catalog
Route::get('collections/{slug}', ['as' => 'collections.show', 'uses' => 'CollectionsController@show']);
Route::get('products/{slug}', ['as' => 'products.show', 'uses' => 'ProductsController@show']);

//Search
Route::get('search', ['as' => 'search.index', 'uses' => 'SearchController@index']);

//Cart
Route::get('cart/{id}/remove', ['as' => 'cart.remove', 'uses' => 'CartController@remove']);
Route::get('cart/destroy', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::put('cart/update', ['as' => 'cart.update', 'uses' => 'CartController@update']);
Route::resource('cart', 'CartController', ['except' => ['create', 'update', 'edit', 'destroy']]);

// Account
Route::get('account', 'AccountController@index');

// Auth
//Route::controllers([
//    'auth'     => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);

// Checkout
/* Route::group(['prefix' => 'checkout'], function () { */
/*     Route::get('/', ['as' => 'checkout.index', 'uses' => 'CheckoutController@index']); */
/*     Route::get('customer', ['as' => 'checkout.customer', 'uses' => 'CheckoutController@customer']); */
/*     Route::post('customer', ['as' => 'checkout.customer', 'uses' => 'CheckoutController@postCustomer']); */
/*     Route::post('customer/guest', ['as' => 'checkout.guest', 'uses' => 'CheckoutController@postGuest']); */
/*     Route::get('shipping', ['as' => 'checkout.shipping', 'uses' => 'CheckoutController@shipping']); */
/*     Route::post('shipping', ['as' => 'checkout.shipping', 'uses' => 'CheckoutController@postShipping']); */
/*     Route::get('billing', ['as' => 'checkout.billing', 'uses' => 'CheckoutController@billing']); */
/*     Route::post('billing', ['as' => 'checkout.billing', 'uses' => 'CheckoutController@postBilling']); */
/*     Route::get('confirm', ['as' => 'checkout.confirm', 'uses' => 'CheckoutController@confirm']); */
/* }); */

Route::group(['prefix' => 'order'], function () {
    Route::get('/', ['as' => 'order.index', 'uses' => 'OrderController@index']);
    Route::get('customer', ['as' => 'order.customer', 'uses' => 'OrderController@customer']);
    Route::post('customer', ['as' => 'order.customer', 'uses' => 'OrderController@postCustomer']);
    Route::get('register', ['as' => 'order.register', 'uses' => 'OrderController@register']);
    Route::post('register', ['as' => 'order.register', 'uses' => 'OrderController@postRegister']);

    Route::get('delivery', ['as' => 'order.delivery.create', 'uses' => 'OrderDeliveryController@create']);
    Route::post('delivery', ['as' => 'order.delivery.store', 'uses' => 'OrderDeliveryController@store']);

    Route::get('payment', ['as' => 'order.payment.create', 'uses' => 'OrderPaymentController@create']);
    Route::post('payment', ['as' => 'order.payment.store', 'uses' => 'OrderPaymentController@store']);

    Route::get('confirm', ['as' => 'order.confirm', 'uses' => 'OrderController@confirm']);
});

// Admin Auth
Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'Admin\AuthController@login']);
Route::post('admin/login', ['as' => 'admin.login', 'uses' => 'Admin\AuthController@postLogin']);
Route::get('admin/logout', ['as' => 'admin.logout', 'uses' => 'Admin\AuthController@getLogout']);

//Admin
Route::group(['name' => 'admin', 'prefix' => 'admin', 'middleware' => 'auth.admin', 'namespace' => 'Admin'], function () {
    Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
    Route::resource('products', 'ProductsController', ['as' => 'admin', 'except' => ['show']]);
    Route::resource('collections', 'CollectionsController', ['as' => 'admin', 'except' => ['show']]);
    Route::resource('orders', 'OrdersController', ['as' => 'admin']);
    Route::resource('customers', 'CustomersController', ['as' => 'admin']);

    Route::get('admin/settings/general', ['as' => 'admin.settings.general', 'uses' => 'SettingsController@general']);
    Route::post('admin/settings/general', ['as' => 'admin.settings.general', 'uses' => 'SettingsController@postGeneral']);
    Route::get('admin/settings/payment', ['as' => 'admin.settings.payments', 'uses' => 'SettingsController@payment']);
    Route::post('admin/settings/payment', ['as' => 'admin.settings.payments', 'uses' => 'SettingsController@postPayment']);
});
