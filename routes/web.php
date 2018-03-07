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
  Route::get('/account/company', 'Admin\CompanyController@index')->name('admin.company.index');
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

Route::get('/logout', 'Account@logout')->name('logout');

Route::get('/get_image', 'Account@get_image')->name('get_image');

// HOME
Route::post('/home/post_comment', 'Alumnus\HomeController@post_comment')->name('post_comment');
Route::post('/home/post_reply', 'Alumnus\HomeController@post_reply')->name('post_reply');


// PROFILE
Route::get('/profile', 'Alumnus\ProfileController@index')->name('profile');

Route::post('/profile/update_personal_info', 'Alumnus\ProfileController@update_personal_info')->name('update_personal_info');

Route::post('/profile/add_eligibility', 'Alumnus\ProfileController@add_eligibility')->name('add_eligibility');

Route::post('/profile/remove_eligibility', 'Alumnus\ProfileController@remove_eligibility')->name('remove_eligibility');

Route::post('/profile/add_certificate', 'Alumnus\ProfileController@add_certificate')->name('add_certificate');

Route::post('/profile/remove_data', 'Alumnus\ProfileController@remove_data')->name('remove_data');

Route::post('/profile/add_experience', 'Alumnus\ProfileController@add_experience')->name('add_experience');

Route::post('/profile/insert_data', 'Alumnus\ProfileController@insert_data')->name('insert_data');

Route::post('/profile/update_skills', 'Alumnus\ProfileController@update_skills')->name('update_skills');


// Jobs
Route::get('/jobs', 'Alumnus\JobController@index')->name('jobs');

Route::get('/jobs/job_search', 'Alumnus\JobController@job_search')->name('job_search');


// My Account

Route::get('/account', 'Account@myAccount')->name('account');

Route::post('/account/update_username', 'Account@update_username')->name('update_username');

Route::post('/account/update_password', 'Account@update_password')->name('update_password');

Route::post('/account/update_contact', 'Account@update_contact')->name('update_contact');

Route::post('/account/update_email', 'Account@update_email')->name('update_email');

// Inbox

Route::get('/inbox', 'Alumnus\InboxController@index')->name('inbox');
