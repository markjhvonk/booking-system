<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@index')->name('dashboard');

Route::get('/admin/studios', 'StudiosController@index');                // display all studios
Route::get('/admin/studios/{studio}', 'StudiosController@studio');      // display specific studio
Route::get('/admin/studios/create', 'StudiosController@create');        // create new studio form
Route::post('/admin/studios', 'StudiosController@store');               // submit new studio
Route::get('/admin/studios/{studio}/edit', 'StudiosController@edit');   // edit specific studio
Route::patch('/admin/studios/{studio}', 'StudiosController@update');     // update specific studio

Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/users/register', 'UsersController@create');
Route::post('/admin/users', 'UsersController@store');

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
