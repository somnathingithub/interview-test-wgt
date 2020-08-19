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

Route::middleware(['auth'])->group(function () {
    Route::get('/items', 'Login_controller@dashboard');
    Route::get('/items/add', 'Items_controller@create');
    Route::post('/items/save', 'Items_controller@store');
    Route::get('/items/edit/{items}', 'Items_controller@show');
    Route::post('/items/update/{items}', 'Items_controller@update');
    Route::get('/items/delete/{items}', 'Items_controller@destroy');
    Route::post('/items/filter', 'Items_controller@filter');

});
