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
Route::prefix('admin')->group(function () {


  //login
  Route::get('/login','Admin\Auth\AdminLoginController@show_form')->name('admin.login');
  Route::post('/login','Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
//  Route::get('logout','Admin\AdminAuth\AuthController@logout');

// Registration Routes...
//  Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
//  Route::post('admin/register', 'AdminAuth\AuthController@register');


//account
  Route::get('/account/alumnus', 'Admin\AlumnusController@get_graduate')->name('alumnus.get_graduate');
  Route::get('/account/partner', 'Admin\PartnersController@index')->name('partner.index');
  Route::get('/account/company', 'Admin\CompanyController@index')->name('company.index');
  Route::get('/account/get_status','Admin\AccountController@get_status')->name('account.status');






  //company
  Route::get('company/visitor', ['as' => 'company.visitor', 'uses' => 'Admin\CompanyController@visitor']);


  Route::resource('advertisement', 'Admin\AdvertisementController');
  Route::resource('alumnus', 'Admin\AlumnusController');
  Route::resource('account', 'Admin\AccountController');
  Route::resource('company', 'Admin\CompanyController');




//
//
//
//  Route::get('/', 'Admin\AdminAuth\AuthController@showLoginForm');
////    Route::post('login','Admin\AdminAuth\AuthController@login');
////    Route::get('logout','Admin\AdminAuth\AuthController@logout');
//
//
//
//

//
//
//
;
//
//
//
//

//
////  Route::get('account/partner', 'Admin\PartnersController@index');
//  Route::get('account/partner', [
//    'as'=>'partner.index',
//    'uses'=>'Admin\PartnersController@index'
//  ]);
//
//
//
//
//

//
//
//
//




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

Route::get('/login', function () {
  return view('login');
});


Route::get('loginValidate', ['as' => 'loginValidate', 'uses' => 'LoginController@loginValidation']);

// Route::get('idInfo', [ 'as' => 'idInfo', 'uses' => 'LoginController@getIdInfo']);

Route::get('/home', function () {
  return view('alumnus/index');
});


