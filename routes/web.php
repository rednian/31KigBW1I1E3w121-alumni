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

Route::get('/', function () {
  return 'welcome';
});

/*
 |----------------------------------------------------------------------------------------------------------------------
 | Admin Routes
 |----------------------------------------------------------------------------------------------------------------------
*/

//login
Route::group(['prefix' => 'admin','middleware' => 'guest:admin'], function () {

  Route::get('/login', 'Admin\Auth\AdminLoginController@show_form')->name('admin.login');
  Route::post('/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');

});

//authorized user access after login
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

  //account
  Route::get('/account/alumnus', 'Admin\AlumnusController@get_graduate')->name('alumnus.get_graduate');
  Route::get('/account/partner', 'Admin\PartnersController@index')->name('partner.index');
  Route::get('/account/company', 'Admin\CompanyController@index')->name('company.index');
  Route::get('/account/get_status', 'Admin\AccountController@get_status')->name('account.status');


  //company
  Route::get('company/visitor', 'Admin\CompanyController@visitor')->name('company.visitor');


  Route::resource('advertisement', 'Admin\AdvertisementController');
  Route::resource('alumnus', 'Admin\AlumnusController');
  Route::resource('account', 'Admin\AccountController');
  Route::resource('company', 'Admin\CompanyController');


});

/*
 |----------------------------------------------------------------------------------------------------------------------
 | Company Routes
 |----------------------------------------------------------------------------------------------------------------------
*/


/*
 |----------------------------------------------------------------------------------------------------------------------
 | Client Routes
 |----------------------------------------------------------------------------------------------------------------------
*/



Route::get('/', ['as' => 'login', 'uses' => 'Account@index']);



Route::post('/loginValidate', [ 'as' => 'loginValidate', 'uses' => 'Account@logIn']);



Route::get('/home', ['as' => 'home', 'uses' => 'Alumnus\HomeController@index']);

// Route::get('/home2', ['as' => 'home2','uses' => 'Alumnus\HomeController@index']);
