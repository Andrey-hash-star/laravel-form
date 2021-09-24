<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::group(['middleware' => 'guest'], function () {
    Route::redirect('/', '/register', 302);
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'MainController@home')->name('home');
    Route::resource('/applications', 'AccountController');
    Route::get('/logout', 'UserController@logout')->name('logout');
});

