<?php

// Old route for index
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['client'])->group(function () {

    Route::middleware(['editor'])->group(function () {

        Route::middleware(['admin'])->group(function () {
            // Studio routing
            Route::get('/admin/studios/create', 'StudiosController@create');        // create studio
            Route::post('/admin/studios', 'StudiosController@store');               // submit studio
            Route::delete('/admin/studios/{studio}', 'StudiosController@delete');   // delete specific studio

            // Equipment related routing
            Route::get('/admin/equipment/create/{current_category?}', 'EquipmentController@create');    // create equipment item
            Route::post('/admin/equipment', 'EquipmentController@store');                               // submit equipment item
            Route::delete('/admin/equipment/{equipment}', 'EquipmentController@delete');                // delete equipment item

            // Category routing
            Route::get('/admin/equipment/category/create', 'CategoriesController@create');          // create category
            Route::post('/admin/equipment/category', 'CategoriesController@store');                 // submit category
            Route::delete('/admin/equipment/category/{category}', 'CategoriesController@delete');   // delete category

            // Packages routing
            Route::get('/admin/equipment/package/create/{current_category?}', 'PackagesController@create'); // create package
            Route::post('/admin/equipment/package/{current_category?}', 'PackagesController@store');        // submit package
            Route::delete('/admin/equipment/package/{package}', 'PackagesController@delete');               // delete package

            // Users routing
            Route::get('/admin/users/register', 'UsersController@create');  // create new user
            Route::post('/admin/users', 'UsersController@store');           // submit new user
            Route::get('/admin/users/{user}/edit', 'UsersController@edit');     // edit user
            Route::patch('/admin/users/{user}', 'UsersController@update');      // update user
            Route::delete('/admin/users/{user}', 'UsersController@delete');     // delete user


        });

        // Admin home page
        Route::get('/admin', 'AdminController@index')->name('dashboard');

        // Studio routing
        Route::get('/admin/studios', 'StudiosController@index');                // display all studios
        Route::get('/admin/studios/{studio}', 'StudiosController@studio');      // display specific studio
        Route::get('/admin/studios/{studio}/edit', 'StudiosController@edit');   // edit   specific studio
        Route::post('/admin/studios/{studio}/add-equipment', 'StudiosController@addEquipment');                         // add equipment to studio
        Route::post('/admin/studios/{studio}/remove-equipment/{equipment_id}', 'StudiosController@removeEquipment');    // remove equipment from studio
        Route::post('/admin/studios/{studio}/add-package', 'StudiosController@addPackage');                             // add package to studio
        Route::post('/admin/studios/{studio}/remove-package/{package_id}', 'StudiosController@removePackage');          // remove package from studio
        Route::post('/admin/studios/{studio}/add-photo', 'StudiosController@addPhoto');                 // add photo to studio
        Route::post('/admin/studios/{studio}/remove-photo/{photo}', 'StudiosController@removePhoto');   // remove photo to studio
        Route::patch('/admin/studios/{studio}', 'StudiosController@update');                            // update specific studio
        Route::patch('/admin/studios/{studio}/visible', 'StudiosController@visible');                   // toggle visibility studio

        // Equipment routing
        Route::get('/admin/equipment', 'EquipmentController@index');                                // dashboard
        Route::get('/admin/equipment/{equipment}/edit', 'EquipmentController@edit');                // edit   equipment item
        Route::patch('/admin/equipment/{equipment}', 'EquipmentController@update');                 // update equipment item
        Route::patch('/admin/equipment/{equipment}/visible', 'EquipmentController@visible');        // toggle visibility equipment item
        Route::get('/admin/equipment/{current_category}', 'EquipmentController@category')->name('equipmentCategory'); // display all equipment items from selected category
        Route::post('/admin/equipment/{current_category}/search', 'EquipmentController@searchEquipment');                                // search equipment

        // Category routing
        Route::get('/admin/equipment/category/{category}/edit', 'CategoriesController@edit');   // edit category
        Route::patch('/admin/equipment/category/{category}', 'CategoriesController@update');    // update category

        // Packages routing
        Route::get('/admin/equipment/package/{package}', 'PackagesController@package');     // display package
        Route::get('/admin/equipment/package/{package}/edit', 'PackagesController@edit');   // edit package
        Route::patch('/admin/equipment/package/{package}', 'PackagesController@update');    // update package
        Route::post('/admin/equipment/package/{package}/add-equipment', 'PackagesController@addEquipment'); // add equipment
        Route::post('/admin/equipment/package/{package}/remove-equipment/{equipment_id}', 'PackagesController@removeEquipment');   // remove equipment

        // Users routing
        Route::get('/admin/users', 'UsersController@index');                // display all users

    });

});

Route::get('/admin/notAuthorised', 'SessionsController@notAuthorised');

// Login routing
Route::get('/admin/login', 'SessionsController@create');        // login page
Route::post('/admin/login', 'SessionsController@store');        // submit login session (log user in)
Route::get('/admin/logout', 'SessionsController@destroy');      // destroy login session (log user out)



/* structure - basic resource controller

GET     admin/studios           display all studios
GET     admin/studios/{id}      display specific studio
GET     admin/studios/create    create new studio
POST    admin/studios submit    new studio
GET     admin/studios/{id}/edit edit specific studio
PATCH   admin/studios/{id}      update specific studio
DELETE  admin/studios/{id}      delete specific studio

*/
