<?php

/*
|-----------------------------------------------------------------------------------------------------------------------
| Web Routes
|-----------------------------------------------------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
*/


/*
 |----------------------------------------------------------------------------------------------------------------------
 | Admin Routes
 |----------------------------------------------------------------------------------------------------------------------
*/

//login
Route::group(['prefix' => 'admin','middleware' => 'guest:admin'], function () {
  Route::get('/login', 'Admin\Auth\AdminLoginController@show_form')->name('admin.login');
  Route::post('/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');

});

//authorized user access after login
Route::group(['prefix' =>'admin', 'middleware' => 'auth:admin'], function () {

//  Route::get('/',function(){
//    Route::get('/account/company', 'Admin\CompanyController@index')->name('admin.company.index');
//  });

  //account
  Route::get('/account/alumnus', 'Admin\AlumnusController@get_graduate')->name('alumnus.get_graduate');
  Route::get('/account/company', 'Admin\CompanyController@index')->name('admin.company.index');
  Route::get('/account/get_status', 'Admin\AccountController@get_status')->name('account.status');


  //company
  Route::get('company/visitor', 'Admin\CompanyController@visitor')->name('company.visitor');

  //resources
  Route::resource('advertisement', 'Admin\AdvertisementController');
  Route::resource('alumnus', 'Admin\AlumnusController');
  Route::resource('account', 'Admin\AccountController');
  Route::resource('company', 'Admin\CompanyController');
  Route::resource('partner', 'Admin\PartnersController');

  //logout
  Route::get('/logout', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');

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
Route::get('/logout', 'Account@logout')->name('logout');

// Route::get('/get_image', function() {
//     return response()->json(['response' => 'This is get method']);
// })->name('get_image');

Route::get('/get_image', 'Account@get_image')->name('get_image');

// Route::get('/home2', ['as' => 'home2','uses' => 'Alumnus\HomeController@index']);
