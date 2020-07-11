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


Route::get('/','ClientController@index')->name('home');

Route::get('/shop','ClientController@shop')->name('shop');

Route::get('/checkout','ClientController@checkout')->name('checkout');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/admin','AdminController@dashboard')->name('admin.home');

Route::get('/add-category','AdminController@AddCategory')->name('add-category');

Route::get('/add-product','AdminController@AddProduct')->name('add-product');

Route::get('/add-slider','AdminController@AddSlider')->name('add-slider');

Route::get('/categories','AdminController@categories')->name('show-categories');

Route::get('/products','AdminController@products')->name('show-products');

Route::get('/sliders','AdminController@sliders')->name('show-sliders');


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::post('/save-product','ProductController@SaveProduct')->name('save-product');

Route::post('/save-category','CategoryController@SaveCategory')->name('save-category');

Route::post('/save-slider','SliderController@SaveSlider')->name('save-slider');


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('shop-category/{id?}','ProductController@product');


/////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('Change-status-product-pending/{id?}','ProductController@ChangeStatusToPending');

Route::get('Change-status-product-active/{id?}','ProductController@ChangeStatusToActive');

Route::get('Change-status-slider-pending/{id?}','SliderController@ChangeStatusToPending');

Route::get('Change-status-slider-active/{id?}','SliderController@ChangeStatusToActive');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('delete-category/{id?}','CategoryController@DeleteCategory');

Route::get('delete-product/{id?}','ProductController@DeleteProduct');

Route::get('delete-slider/{id?}','SliderController@DeleteSlider');


///////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('edit-category/{id}','CategoryController@EditCategory')->name('edit-category');
Route::post('update-category/{id}','CategoryController@UpdateCategory')->name('update-category');
////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('edit-product/{id}','ProductController@EditProduct')->name('edit-product');
Route::post('update-product/{id}','ProductController@UpdateProduct')->name('update-product');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('edit-slider/{id}','SliderController@EditSlider')->name('edit-slider');
Route::post('update-slider/{id}','SliderController@UpdateSlider')->name('update-slider');




Route::get('show-product/{id}','ProductController@ShowProduct')->name('Show-ProductSingle');


Route::get('get-checkout','PaymentProviderController@GetCheckOutId');
