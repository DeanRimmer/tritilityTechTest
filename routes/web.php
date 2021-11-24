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
    return view('/login');
});

//login routes
Route::get('/login', 'MainController@index');
Route::post('/login/checklogin', 'MainController@checklogin');
Route::get('login/successlogin', 'MainController@successlogin');
Route::get('login/logout', 'MainController@logout');

//company routes
Route::get('company', 'CompanyController@index');
Route::get('/add-company', 'CompanyController@create');
Route::post('/insert', 'CompanyController@store');
Route::get('company-edit/{id}', 'CompanyController@edit');
Route::post('/update/{id}', 'CompanyController@update');
Route::get('company-delete/{id}', 'CompanyController@destroy');

//employee routes
Route::get('employee', 'EmployeeController@index');
Route::get('/add-employee', 'EmployeeController@create');
Route::post('/insert-employee', 'EmployeeController@store');
Route::get('employee-edit/{id}', 'EmployeeController@edit');
Route::post('/update-employee/{id}', 'EmployeeController@update');
Route::get('employee-delete/{id}', 'EmployeeController@destroy');

