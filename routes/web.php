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
    return view('/all_systems');
});
Route::get('/departments', 'DepartmentController@index');
Route::post('new_department', 'DepartmentController@store');
Route::post('edit_department/{id}', 'DepartmentController@edit');
Route::post('delete/{id}', 'DepartmentController@delete');

Route::get('/system_setup', 'SystemController@system_setup');
Route::post('/new_system', 'SystemController@store');
Route::post('edit_system/{id}', 'SystemController@edit');
Route::post('delete/system/{id}', 'SystemController@delete');


Route::get('/system/{name}/{id}', 'SystemController@show');
Route::get('/all_systems', 'SystemController@all_systems');



