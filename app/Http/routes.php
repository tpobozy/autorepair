<?php


Route::get('/', 'HomeController@index');


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
Route::get('orders/{orders}/print-order', 'OrdersController@printOrder')->name('orders.print_order');
Route::get('orders/{orders}/print-service', 'OrdersController@printService')->name('orders.print_service');
Route::get('orders/template', 'OrdersController@template')->name('orders.template');


Route::resource('reports', 'ReportsController', ['only' => [
    'index',
]]);


Route::get('car/details', 'CarsController@details')->name('cars.details');
Route::get('client/details', 'ClientsController@details')->name('clients.details');

Route::resource('employees', 'EmployeesController', ['except' => [
    'show',
]]);