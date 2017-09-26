<?php

// Old route for index
Route::get('/', function () {
    return view('welcome');
});

// Admin home page
Route::get('/admin', 'AdminController@index')->name('dashboard');

// Studio related routing
Route::get('/admin/studios', 'StudiosController@index');                // display all studios
Route::get('/admin/studios/create', 'StudiosController@create');        // create studio
Route::post('/admin/studios', 'StudiosController@store');               // submit studio
Route::get('/admin/studios/{studio}', 'StudiosController@studio');      // display specific studio
Route::get('/admin/studios/{studio}/edit', 'StudiosController@edit');   // edit   specific studio
Route::patch('/admin/studios/{studio}', 'StudiosController@update');    // update specific studio
Route::delete('/admin/studios/{studio}', 'StudiosController@delete');   // delete specific studio

// Equipment related routing
Route::get('/admin/equipment', 'EquipmentController@index');
Route::get('/admin/equipment/create', 'EquipmentController@create');
Route::post('/admin/equipment', 'EquipmentController@store');
Route::get('/admin/equipment/{current_category}', 'EquipmentController@category');

// User related routing
Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/users/register', 'UsersController@create');
Route::post('/admin/users', 'UsersController@store');

// Login routing
Route::get('/admin/login', 'SessionsController@create');
Route::post('/admin/login', 'SessionsController@store');
Route::get('/admin/logout', 'SessionsController@destroy');


/* structure - basic resource controller

GET     admin/studios           display all studios
GET     admin/studios/{id}      display specific studio
GET     admin/studios/create    create new studio
POST    admin/studios submit    new studio
GET     admin/studios/{id}/edit edit specific studio
PATCH   admin/studios/{id}      update specific studio
DELETE  admin/studios/{id}      delete specific studio

*/
