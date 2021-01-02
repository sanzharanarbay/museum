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
Route::get('/upcoming-events','DemoController@events');
Route::get('/upcoming-events/{unique_id}','DemoController@singleEvent')->name('single.event');
Route::get('/museum-items','DemoController@museumitems');
Route::get('/announcements','DemoController@announcements');
Route::get('/gallery-items','DemoController@galleryitems');
Route::get('/contact','DemoController@contact');
Route::get('/virtual-tour','DemoController@virtualtour');

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
    Route::resource('gallery', 'GalleryController');
    Route::resource('news', 'NewsController');
    Route::resource('events', 'EventController');
});

