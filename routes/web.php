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
Route::group(['prefix'=>'admin', 'middleware'=>'Admin'], function () {
    Route::get('/', 'AdminGetController@get_index');
    Route::get('/index', 'AdminGetController@get_index');
    Route::get('/home', 'AdminGetController@get_index');
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::group(['prefix'=>'clients'], function () {
        Route::get('/', 'AdminGetController@get_clients');
        Route::post('/', 'AdminPostController@post_delete_client');
    });

    Route::group(['prefix'=>'services'], function () {
        Route::get('/', 'AdminGetController@get_services');
        Route::post('/', 'AdminPostController@post_delete_service');
        Route::get('/add', 'AdminGetController@get_add_service');
        Route::post('/add', 'AdminPostController@post_add_service');
        Route::get('/update/{id}', 'AdminGetController@get_update_service');
        Route::post('/update/{id}', 'AdminPostController@post_update_service');
    });

    Route::group(['prefix'=>'admins'], function () {
        Route::get('/', 'AdminGetController@get_admins');
        Route::post('/', 'AdminPostController@post_delete_admin');
        Route::get('/add', 'AdminGetController@get_add_admin');
        Route::post('/add', 'AdminPostController@post_add_admin');
        Route::get('/update/{id}', 'AdminGetController@get_update_admin');
        Route::post('/update/{id}', 'AdminPostController@post_update_admin');
    });

    Route::group(['prefix'=>'queues'], function () {
        Route::get('/', 'AdminGetController@get_queues');
        Route::post('/', 'AdminPostController@post_delete_queue');
    });

    Route::group(['prefix'=>'reservations'], function () {
        Route::get('/', 'AdminGetController@get_reservations');
        Route::post('/', 'AdminPostController@post_delete_reservation');
    });
});

Auth::routes();
