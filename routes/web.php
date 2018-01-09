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
    return view('welcome');
});

//Route::get('/','Admin\HomeController@index');

//admin....

Route::prefix('admin')->group(function () {



    Route::get('company/visitor', array(
        'as' =>'company.visitor',
        'uses'=>'Admin\CompanyController@visitor'
    ));

    Route::resource('alumni','Admin\AlumnusController');

    Route::resource('account','Admin\AccountController');

    Route::resource('advertisement','Admin\AdvertisementController');

//    Route::get('users', function () {
//        // Matches The "/admin/users" URL
//    });
});

