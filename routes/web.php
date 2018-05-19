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

Route::get('/', 'HomeGetController@get_index');
Route::get('/index', 'HomeGetController@get_index');
Route::get('/home', 'HomeGetController@get_index');
Route::post('/', 'HomePostController@post_index');
Route::post('/index', 'HomePostController@post_index');
Route::post('/home', 'HomePostController@post_index');
Route::get('/online-queue/{service_id}/{serial_number}', 'HomeGetController@get_queue');
Route::post('/online-queue/{service_id}/{serial_number}', 'HomePostController@post_queue');

//Route::post('/queue/get-queue', 'HomeAjaxController@ajax_get_queue');

//admin panel
Route::group(['prefix'=>'admin'], function () {
    Route::get('/', 'AdminGetController@get_index');
    Route::get('/index', 'AdminGetController@get_index');
    Route::get('/home', 'AdminGetController@get_index');

    Route::group(['prefix'=>'clients'], function () {
        Route::get('/', 'AdminGetController@get_clients');
        Route::post('/', 'AdminPostController@post_delete_client');
    });

    Route::group(['prefix'=>'services'], function () {
        Route::get('/', 'AdminGetController@get_services');
        Route::post('/', 'AdminPostController@post_delete_service');
        Route::get('/add', 'AdminGetController@get_add_service');
        Route::post('/add', 'AdminPostController@post_add_service');
        Route::get('/update', 'AdminGetController@get_update_service');
        Route::post('/update', 'AdminPostController@post_update_service');
    });

    Route::get('/logout', 'AdminGetController@get_logout');
});