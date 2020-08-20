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

Route::get('/login', [ 'as' => 'login', 'uses' => 'Login_controller@index']);
Route::post('/login/check', 'Login_controller@check');
Route::get('/dashboard', 'Login_controller@dashboard');
Route::get('/logout', 'Login_controller@logout');

Route::get('/registration', 'Registration_controller@index');
Route::post('/registration/save', 'Registration_controller@save');
