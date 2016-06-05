 <?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('template', function () {
                                
   return View::make('template'); });

Route::get('temp', function () {
                                
   return View::make('tem'); });
Route::get('privasi', function () {
                               
   return View::make('auth.privasi'); });
Route::get('kebijakan', function () {
                               
   return View::make('auth.kebijakan'); });
Route::get('listkosong', function () {
                               
   return View::make('admin.user.listkosong'); });
Route::get('listkos', function () {
                               
   return View::make('admin.user.listko'); });
Route::get('lis', function () {
                               
   return View::make('admin.kategori.listko'); });
Route::get('lispin', function () {
                               
   return View::make('admin.peminjaman.listko'); });
Route::get('lispo', function () {
                               
   return View::make('admin.peminjaman.listkos'); });

Route::get('liska', function () {
                               
   return View::make('katalog.listkosong'); });

  // Password reset link request routes.
// Registration routes...

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and mre.
|
*/

Route::group(['middleware' => ['web']], function () {

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::resource('profile','UbahUserController');
Route::post('profile/{id}/update',['as'=>'profile.update','uses'=>'UbahUserController@update']);

Route::resource('kategori', 'KategoriController');
Route::post('kategori/search','KategoriController@search');
Route::get('catalogs/search','CatalogController@search');
Route::post('pinjam/search','PeminjamanController@search');
Route::post('point/search','AdminController@search');

Route::get('/listpro','UbahUserController@listku');
Route::get('/listpinjam','UbahUserController@listpinjam');

Route::get('/baranguser','UbahUserController@edit');


Route::get('auth/verify/{token}', 'Auth\AuthController@verify');
Route::get('auth/send-verification', 'Auth\AuthController@sendVerification');

//grafikgrafk
Route::get('/grafpin','AdminController@grafikPin');
Route::get('/grafpij','AdminController@grafikPij');
Route::get('/grafme','AdminController@grafikMe');

Route::resource('admin/peminjaman', 'PeminjamanController');

Route::post('user/search','TableUserController@search');
Route::resource('/listuser','TableUserController');
Route::get('/admin', 'AdminController@index');
Route::get('/reward', 'AdminController@showpoint');
Route::resource('user/barang', 'UserBarangController');
Route::get('user/barang/{id}/destroy',['as'=>'user.barang.destroy','uses'=>'UserBarangController@destroy']);
Route::get('user/barang/{id}/showpinjam',['as'=>'user.barang.showpinjam','uses'=>'UserBarangController@showPinjam']);

 Route::get('user/barang/{id}/borrow', [
        //'middleware'=>['auth', 'role:member'],
        'as'=>'user.barang.borrow',
        'uses'=>'UserBarangController@borrow']);
Route::get('contact/{id}', 
  ['as' => 'contact', 'uses' => 'AdminController@create']);
Route::post('contact', 
  ['as' => 'contact_store', 'uses' => 'AdminController@store']);




Route::post('barang/search','AdminBarangController@search');
Route::resource('admin/barang', 'AdminBarangController');

Route::get('/', 'CatalogController@index');
Route::get('/catalogs','CatalogController@index');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset/', 'Auth\PasswordController@postReset');

Route::post('cart', 'CartController@addProduct');
Route::get('cart', 'CartController@show');
Route::delete('cart/{barang_id}', 'CartController@removeProduct');
Route::put('admin/peminjaman/{barang}/return', [
//'middleware'=>['auth', 'role:member'],
'as'=>'admin.peminjaman.return',
'uses'=>'PeminjamanController@returnBack']);

Route::put('admin/peminjaman/{barang}/returni', [
//'middleware'=>['auth', 'role:member'],
'as'=>'admin.peminjaman.returni',
'uses'=>'PeminjamanController@returnAh']);


});

