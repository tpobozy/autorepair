<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
//Route::get('/', function () {
//    return view('welcome');
//});

#Route::auth();
// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
//Route::get('register', 'Auth\AuthController@showRegistrationForm');
//Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');


Route::resource('orders', 'OrdersController', ['except' => [
    'show',
]]);
Route::get('orders/{orders}/printer', 'OrdersController@printer')->name('orders.printer');
Route::get('orders/template', 'OrdersController@template')->name('orders.template');


Route::resource('reports', 'ReportsController', ['only' => [
    'index',
]]);


Route::get('car/details', 'CarsController@details')->name('cars.details');
Route::get('client/details', 'ClientsController@details')->name('clients.details');

Route::resource('employees', 'EmployeesController', ['except' => [
    'show',
]]);