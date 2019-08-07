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

//HomePage
Route::get('/home/index', 'HomeController@index')->name('home.index');
Route::get('/home/appoint', 'HomeController@appoint')->name('home.appoint');
Route::post('/home/appoint', 'HomeController@create');
Route::get('/home/service', 'HomeController@service')->name('home.service');
Route::get('/home/about', 'HomeController@about')->name('home.about');
Route::get('/home/contact', 'HomeController@contact')->name('home.contact');
Route::post('/home/contact', 'HomeController@contactCreate');

//Login
Route::get('/login/index', 'LoginController@index')->name('login.index');
Route::post('/login/index', 'LoginController@valid');

//Logout
Route::get('/logout', 'LogoutController@index')->name('logout.index');

//Admin
Route::get('/admin/index', 'AdminController@index')->name('admin.index');