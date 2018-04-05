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
})->name('landing.page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
    // START AUTH
   Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
   Route::get('/', 'AdminController@index')->name('admin.dashboard');
   // END AUTH
});

Route::prefix('university')->group(function() {
    // START AUTH
   Route::get('/login','Auth\UniversityLoginController@showLoginForm')->name('university.login');
   Route::post('/login', 'Auth\UniversityLoginController@login')->name('university.login.submit');
   Route::get('/register','Auth\UniversityLoginController@showRegisterForm')->name('university.register');
   Route::post('/register', 'Auth\UniversityRegisterController@register')->name('university.register.submit');
   Route::get('logout/', 'Auth\UniversityLoginController@logout')->name('university.logout');
   Route::get('/', 'UniversityController@index')->name('university.dashboard');
   // END AUTH
   // START PROFILE
   Route::get('profile','UniversityController@edit')->name('university.edit');
   Route::put('profile/{university}','UniversityController@update')->name('university.update');
   Route::post('profile/password/{university}','UniversityController@updatePassword')->name('university.password.update');
   // END PROFILE
});

Route::prefix('donor')->group(function() {
    // START AUTH
   Route::get('/login','Auth\DonorLoginController@showLoginForm')->name('donor.login');
   Route::post('/login', 'Auth\DonorLoginController@login')->name('donor.login.submit');
   Route::get('/register','Auth\DonorLoginController@showRegisterForm')->name('donor.register');
   Route::post('/register', 'Auth\DonorRegisterController@register')->name('donor.register.submit');
   Route::get('logout/', 'Auth\DonorLoginController@logout')->name('donor.logout');
   Route::get('/', 'DonorController@index')->name('donor.dashboard');
   // END AUTH
});
