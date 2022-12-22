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
//Frontendphẩm
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/tim-kiem', 'HomeController@search');

//Danh muc san phẩm trang chủ
Route::get('/danh-muc-san-pham/{id}', 'Category@show_category_home');
Route::get('/thuong-hieu-san-pham/{id}', 'Brand@show_brand_home');
Route::get('/chi-tiet-san-pham/{id}', 'Product@details_product');

//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');

//Category
Route::get('/category', 'Category@category');
Route::get('/edit-category/{id}', 'Category@edit_category');
Route::get('/delete-category/{id}', 'Category@delete_category');


Route::post('/save-category', 'Category@save_category');
Route::post('/update-category/{id}', 'Category@update_category');

//Brand
Route::get('/brand', 'Brand@brand');
Route::get('/edit-brand/{id}', 'Brand@edit_brand');
Route::get('/delete-brand/{id}', 'Brand@delete_brand');


Route::post('/save-brand', 'Brand@save_brand');
Route::post('/update-brand/{id}', 'Brand@update_brand');

//Product
Route::get('/add-product', 'Product@add_product');
Route::get('/all-product', 'Product@all_product');
Route::get('/edit-product/{id}', 'Product@edit_product');
Route::get('/delete-product/{id}', 'Product@delete_product');


Route::post('/save-product', 'Product@save_product');
Route::post('/update-product/{id}', 'Product@update_product');

Route::get('/unactive-product/{id}', 'Product@unactive_product');
Route::get('/active-product/{id}', 'Product@active_product');

//Supplier
Route::get('/supplier', 'SupplierController@supplier');
Route::get('/edit-supplier/{id}', 'SupplierController@edit_supplier');
Route::get('/delete-supplier/{id}', 'SupplierController@delete_supplier');


Route::post('/save-supplier', 'SupplierController@save_supplier');
Route::post('/update-supplier/{id}', 'SupplierController@update_supplier');

//Cart
Route::post('/save-cart', 'CartController@save_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::post('/update-cart', 'CartController@update_cart');

//Checkout
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::post('/add-user', 'CheckoutController@add_user');
Route::get('/show-checkout', 'CheckoutController@checkout');
Route::post('/save-checkout', 'CheckoutController@save_checkout');
Route::get('/logout-checkout', 'CheckoutController@logout_checkout');
Route::post('/login-user', 'CheckoutController@login_user');
Route::get('/payment', 'CheckoutController@payment');
Route::get('/order-detail/{id}', 'CheckoutController@order_detail');

//Order
Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/edit-order/{id}', 'CheckoutController@edit_order');
Route::post('/update-status/{id}', 'CheckoutController@update_status');

//Input
Route::get('/add-input', 'InputController@add_input');
Route::get('/all-input', 'InputController@all_input');
Route::post('/save-input', 'InputController@save_input');
Route::post('/save-input-detail', 'InputController@save_input_detail');
Route::get('/edit-input/{id}', 'InputController@edit_input');
Route::post('/update-input/{id}', 'InputController@update_input');