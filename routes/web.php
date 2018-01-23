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


//account
  Route::get('account/alumnus', ['as'=>'alumnus.get_graduate', 'uses'=>'Admin\AlumnusController@get_graduate']);
  Route::get('account/partner', ['as'=>'partner.index', 'uses'=>'Admin\PartnersController@index']);
  Route::get('account/get_status', ['as' => 'account.status', 'uses'=>'Admin\AccountController@get_status']);






  //company
  Route::get('company/visitor', ['as' => 'company.visitor', 'uses' => 'Admin\CompanyController@visitor']);


  //company
  Route::resource('advertisement', 'Admin\AdvertisementController');

  Route::resource('alumnus', 'Admin\AlumnusController');
//  account
  Route::resource('account', 'Admin\AccountController');



//  //login
//  Route::get('login', 'Admin\AdminAuth\AuthController@showLoginForm');
////    Route::post('login','Admin\AdminAuth\AuthController@login');
////    Route::get('logout','Admin\AdminAuth\AuthController@logout');
//
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

////  Route::resource('partner', 'Admin\PartnersController');


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


