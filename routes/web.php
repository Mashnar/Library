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

Auth::routes();

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');





Route::get('/home', 'HomeController@user')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin');



Route::get('/add_book','MenageController@add')->name('add_book');
Route::post('add','MenageController@submit')->name('submit');
Route::get('/show_book','MenageController@show')->name('show_book');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/wypozycz','MenageController@take')->name('wypozycz');
Route::get('/update/{id}','MenageController@wypozycz')->name('update');
Route::get('/list','MenageController@list')->name('list');
Route::get('/personal','MenageController@show_personal')->name('personal_show');
