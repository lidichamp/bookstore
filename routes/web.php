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
Route::get('auth/register', 'Auth\RegisterController@getRegister');
Route::post('auth/register', 'Auth\RegisterController@postRegister');
Route::get('user/auth/login', ['as'=>'login','uses'=>'Auth\LoginController@getLogin']);
Route::post('user/auth/login', 'UserController@postLogin');
Route::get('auth/logout', 'UserController@getLogout');
Route::post ('admin','UserController@seeAdminLogin') ;
Route::get ('admin','UserController@seeAdminLogin') ;
Route::get ('administrator',['as'=>'administrator','uses'=>'UserController@postAdminLogin']) ;
Route::post ('administrator',['as'=>'administrator','uses'=>'UserController@postAdminLogin'])  ;
Route::get('/', ['uses' => 'BookController@getIndex','as' => 'homepage']);
// Route::get('/home', [ 'uses' => 'BookController@getIndex']);
Route::get('/index', ['uses' => 'BookController@getIndex']);
//Route::get('/author', 'AuthorController@index')->name('author');

Route::get('/author', ['uses' => 'AuthorController@getIndex','as' => 'author']);
Route::group(['middleware' => 'auth'], function(){
    Route::get('/addproduct', array('before'=>'auth.basic','as'=>'addproduct','uses'=>'BookController@AddBookView'));
Route::get('/cart', array('before'=>'auth.basic','as'=>'cart','uses'=>'CartController@getIndex'));
Route::get('/cart/add', array('before'=>'auth.basic','uses'=>'CartController@postAddToCart'));
Route::post('/cart/add', array('before'=>'auth.basic','uses'=>'CartController@postAddToCart'));
Route::get('/cart/delete/{id}', array('before'=>'auth.basic','as'=>'delete_book_from_cart','uses'=>'CartController@getDelete'));
Route::post('/order', array('before'=>'auth.basic','uses'=>'OrderController@postOrder'));
Route::get('/user/orders', array('before'=>'auth.basic','uses'=>'OrderController@getIndex'));

Route::get('dummy_form', 'TestController@showForm');
Route::post('dummy_form_post', 'TestController@postForm');

Route::match(['get', 'post'], 'dummy_form_combine', ['uses' => 'TestController@combined', 'as'=> 'dummy_form_route'])
;});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
