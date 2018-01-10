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

//admin....
Route::get('/admin','Admin\HomeController@index');

Route::resource('/admin/account','Admin\AccountController');

Route::get('/admin/alumni','Admin\AlumnusController@index');





// --------------------------------------- alumnus ----------------------------------------------------------------

Route::get('/home', function () {
	return view('alumnus/index');
});