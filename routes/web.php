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
Route::post ('adminend','UserController@seeAdminLogin') ;
Route::get ('adminend','UserController@seeAdminLogin') ;
Route::get ('author/delete',['as'=>'adelete','uses'=>'adminAuthorController@getDelete']) ;
Route::post ('author/delete',['as'=>'adelete','uses'=>'adminAuthorController@getDelete']) ;
Route::get ('book/delete',['as'=>'bdelete','uses'=>'adminBookController@getDelete']) ;
Route::post ('book/delete',['as'=>'bdelete','uses'=>'adminBookController@getDelete']) ;
Route::get ('administrator',['as'=>'administrator','uses'=>'UserController@postAdminLogin']) ;
Route::post ('administrator',['as'=>'administrator','uses'=>'UserController@postAdminLogin'])  ;
Route::get('/', ['uses' => 'BookController@getIndex','as' => 'homepage']);
// Route::get('/home', [ 'uses' => 'BookController@getIndex']);
Route::get('/index', ['uses' => 'BookController@getIndex']);
//Route::get('/author', 'AuthorController@index')->name('author');
Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/book', array('before'=>'auth.basic','as'=>'addbook','uses'=>'adminBookController@getIndex'));
    Route::get('/admin/editbook', array('before'=>'auth.basic','as'=>'editbook','uses'=>'adminBookController@editBook'));
    Route::get('/admin/dashboard', array('before'=>'auth.basic','as'=>'dashboard','uses'=>'adminBookController@Dashboard'));
    Route::get('/admin/editauthor', array('before'=>'auth.basic','as'=>'editauthor','uses'=>'adminAuthorController@editAuthor'));
    Route::get('/admin/editauthors', array('before'=>'auth.basic','as'=>'editauthors','uses'=>'adminAuthorController@editAuthors'));
    Route::post('/admin/editauthors', array('before'=>'auth.basic','as'=>'editauthors','uses'=>'adminAuthorController@editAuthors'));
    Route::get('/admin/author', array('before'=>'auth.basic','as'=>'addauthor','uses'=>'adminAuthorController@getIndex'));
    Route::post('/admin/author/add', array('before'=>'auth.basic','as'=>'add-new-authors','uses'=>'adminAuthorController@storeAuthor'));
    Route::get('/admin/author/add', array('before'=>'auth.basic','as'=>'add-new-authors','uses'=>'adminAuthorController@storeAuthor'));
    Route::post('/admin/book/add', array('before'=>'auth.basic','as'=>'add-new-books','uses'=>'adminBookController@storeBook'));
    Route::get('/admin/book/add', array('before'=>'auth.basic','as'=>'add-new-books','uses'=>'adminBookrController@storeBook'));
    Route::post('/admin/author/edited', array('before'=>'auth.basic','as'=>'add-new-authord','uses'=>'adminAuthorController@saveEditAuthors'));
    Route::get('/admin/author/edited', array('before'=>'auth.basic','as'=>'add-new-authord','uses'=>'adminAuthorController@saveEditAuthors'));
});

Route::get('/author', ['uses' => 'AuthorController@getIndex','as' => 'author']);
Route::group(['middleware' => 'auth'], function(){
Route::get('/addproduct', array('before'=>'auth.basic','as'=>'addproduct','uses'=>'adminBookController@AddBookView'));
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
