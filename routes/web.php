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

//Route::get('/','Admin\HomeController@index');

/*
 |----------------------------------------------------------------------------------------------------------------------
 | Admin Routes
 |----------------------------------------------------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    //login

    Route::get('login','Admin\AdminAuth\AuthController@showLoginForm');
//    Route::post('login','Admin\AdminAuth\AuthController@login');
//    Route::get('logout','Admin\AdminAuth\AuthController@logout');


    Route::get('/','Admin\AdminAuth\AuthController@showLoginForm');
//    Route::post('login','Admin\AdminAuth\AuthController@login');
//    Route::get('logout','Admin\AdminAuth\AuthController@logout');


    Route::get('company/visitor',[
        'as' =>'company.visitor',
        'uses'=>'Admin\CompanyController@visitor'
    ]);

    Route::resource('alumni','Admin\AlumnusController');

	  Route::get('/admin/alumni','Admin\AlumnusController@index');

    Route::resource('account','Admin\AccountController');

    Route::resource('advertisement','Admin\AdvertisementController');


    Route::resource('account','Admin\AccountController');

    Route::resource('advertisement','Admin\AdvertisementController');

    Route::get('/admin/alumni','Admin\AlumnusController@index');

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

Route::get('/login', function() {
	return view('login');
});


Route::get('loginValidate', [ 'as' => 'loginValidate', 'uses' => 'LoginController@loginValidation']);

// Route::get('idInfo', [ 'as' => 'idInfo', 'uses' => 'LoginController@getIdInfo']);

Route::get('/home', function () {
	return view('alumnus/index');
});


