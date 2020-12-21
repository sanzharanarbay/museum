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


Route::get('/','DemoController@index');
Route::get('/about','DemoController@about');
Route::get('/menu','DemoController@menu');
Route::get('/reservation','DemoController@reservation');
Route::get('/staff','DemoController@staff');
Route::get('/gallery','DemoController@gallery');
Route::get('/contact','DemoController@contact');

Auth::routes(
    [
        'register'=>false
    ]
);

Route::group(['middleware' => ['auth','preventBackHistory'], 'namespace' => 'Admin'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('categories', 'CategoryController');
    Route::resource('items', 'ItemController');
});

