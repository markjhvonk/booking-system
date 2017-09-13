<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/studios', 'StudiosController@index');
Route::get('/admin/studios/create', 'StudiosController@create');
Route::get('/admin/studios/{studio}', 'StudiosController@studio');
Route::post('/admin/studios', 'StudiosController@store');


/* structure - basic resource controller

GET     admin/studios           display all studios
GET     admin/studios/create    create new studio
POST    admin/studios submit    new studio
GET     admin/studios/{id}/edit edit specific studio
GET     admin/studios/{id}      display specific studio
PATCH   admin/studios/{id}      update specific studio
DELETE  admin/studios/{id}      delete specific studio

*/
