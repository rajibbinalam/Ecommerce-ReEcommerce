<?php

use Illuminate\Support\Facades\Route;

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


//Show All Data To the Web Site
Route::get('/','ProductController@indexShow')->name('indexShow');

Route::get('/products','ProductController@showWeb')->name('showWeb');

Route::get('/single_product/{id}','ProductController@showSingle')->name('showSingle');


//  Adding Cart Functionality...........
Route::post('/add-to-cart','ProductController@addToCart')->name('addToCart');
Route::get('/cart','ProductController@viewCart')->name('viewCart');
Route::get('/remove/{rowId}','ProductController@removeItem')->name('removeItem');

Route::post('/update-cart-item','ProductController@updateCartItem');


// Route::get('/products', function () {
//     return view('products');
// });
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});




Route::prefix('admin')->middleware('auth')->name('admin')->group(function(){
    Route::get('index', function(){
        return view('admin.index');
    })->name('index');

    //Category Controller
  
    Route::get('categories','CategoryController@index')->name('categories');
    Route::post('/addCategory','CategoryController@addCategory')->name('addCategory');
    Route::get('/categories/delete/{id}','CategoryController@deleteCategory')->name('deleteCategory');


    // Products Controller
    Route::get('add-product','ProductController@addProducts')->name('add-product');
    Route::post('/addProduct','ProductController@addProduct')->name('addProduct');
    Route::get('all-products','ProductController@allProducts')->name('allProducts');
    Route::get('/all-products/edit/{id}','ProductController@editProduct')->name('editProduct');
    Route::post('/update/{id}','ProductController@updateProduct')->name('updateProduct');
    Route::get('/all-products/delete/{id}','ProductController@deleteProduct')->name('deleteProduct');

    
    // Subscriber Controller
    Route::get('/subscribers','SubscriberController@index')->name('subscriber');


});


// Subscriber Controller
Route::get('/subscriber','SubscriberController@addSubscriber')->name('addSubscriber');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
