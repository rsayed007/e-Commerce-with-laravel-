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

// Route::get('/', function () {
//     return view('welcome');
// });

// ----- Admin controller route
Route::get('admin/home', 'admin\ProductController@adminIndex');
Route::get('admin/add/product', 'admin\ProductController@addProduct');
Route::post('admin/insert/product', 'admin\ProductController@productInsert');
Route::get('admin/view/product', 'admin\ProductController@viewProduct');
Route::get('admin/delete/product/{product_id}', 'admin\ProductController@deleteProduct');
Route::get('admin/restore/product/{product_id}', 'admin\ProductController@restoreProduct');
Route::get('admin/finalDelete/product/{product_id}', 'admin\ProductController@finalDelete');
Route::get('admin/edit/product/{product_id}', 'admin\ProductController@editProduct');
Route::post('admin/update/product', 'admin\ProductController@updateProduct');


// --------- slider router
Route::get('admin/add/slider', 'admin\SliderController@addSlider');
Route::post('admin/insert/slider', 'admin\SliderController@insertSlider');
Route::get('admin/view/slider', 'admin\SliderController@viewSlider');
Route::get('admin/delete/slider/{slider_id}', 'admin\SliderController@deleteSlider');
Route::get('admin/restore/slider/{slider_id}', 'admin\SliderController@restoreSlider');
Route::get('admin/finaldelete/slider/{slider_id}', 'admin\SliderController@finalDeleteSlider');
Route::get('admin/edit/slider/{slider_id}', 'admin\SliderController@editSlider');
Route::post('admin/update/slider', 'admin\SliderController@updateSlider');

// --------- Category Controller router
Route::get('admin/category', 'admin\CategoryController@addCategory');
Route::post('admin/category/insert', 'admin\CategoryController@insertCategory');
Route::get('admin/delete/category/{category_id}', 'admin\CategoryController@deleteCategory');


// --------- Color Controller router
Route::get('admin/colors', 'admin\ColorController@addColors');
Route::post('admin/colors/insert', 'admin\ColorController@insertColors');
Route::get('admin/delete/color/{color_id}', 'admin\ColorController@deleteColor');

// --------- Size Controller router
Route::get('admin/size', 'admin\SizeController@addSize');
Route::post('admin/size/insert', 'admin\SizeController@insertSize');
Route::get('admin/delete/size/{size_id}', 'admin\SizeController@deleteSize');
Route::get('admin/restore/size/{size_id}', 'admin\SizeController@restoreSize');

// -------------  Coupon controller
Route::get('/coupon', 'admin\CuponController@addCoupon');
Route::post('/coupon/create', 'admin\CuponController@createCoupon');


// ----- Admin controller route end



//  ----------- user controller route
Route::get('/', 'user\FrontendController@userIndex');
Route::get('/product/{product_id}', 'user\FrontendController@productDetails');

// ------------ cart url
Route::post('/add/to/cart', 'user\FrontendController@addToCart');

// -------------  cart controller
Route::get('/cart/view', 'user\CartController@viewCart')->name('cart');
Route::get('/cart/view/delete/{cart_id}', 'user\CartController@deleteCart');
Route::get('/cart/view/{coupon_name}', 'user\CartController@viewCart');






Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



