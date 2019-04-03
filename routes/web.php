<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rutas de la aplicacion
|
*/

Route::get('/', 'Auth\LoginController@index')->name('main');
Auth::routes();

/******************************************
            Rutas para el sistema         *
 ******************************************/
//Verificacion de la existencia de una columna
Route::post('/operations/ajax/column_exists', 'VerificationsController@column_exists')->name('verify.column_exists');
Route::post('/auth/check', 'VerificationsController@loggedIn')->name('validation');

Route::group(['middleware'=>['auth']], function () {
    /******************************************
        Ruta para el control de la aplicacion *
     ******************************************/
    //Principales
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    /**************  Termina control aplicacion  ***************/

    /*******************************************
     * Rutas para para user profile            *
     *******************************************/

    //Mostrar Perfil del Usuario
    Route::get('/profile', 'UserController@showOwnProfile')->where('id', '[0-9]+')->name('profile.show_own_profile');
    //Editar Perfil del Usuario
    Route::get('/profile/edit', 'UserController@editOwnProfile')->where('id', '[0-9]+')->name('profile.edit');
    //Actualizar Perfil de Usuario
    Route::put('/profile', 'UserController@updateOwnProfile')->name('profile.update_own_profile');
    /**************  Termina user profile  ***************/

    /*******************************************
     * Rutas para para las operaciones AJAX    *
     *******************************************/
     Route::post('/operations/ajax/reports/ObtenerDatosSin', 'ReportsController@ObtenerDatosSin')->name('reports.ObtenerDatosSin');
     Route::post('/operations/ajax/reports/ObtenerDatosCon', 'ReportsController@ObtenerDatosCon')->name('reports.ObtenerDatosCon');
    /**************  Termina operaciones AJAX  ***************/

    /**
     * Rutas solo para administradores
     */
    Route::group(['middleware'=>['access:1']], function(){
        /***************************************************
         *  Rutas para control de los usuarios del sistema *
         ***************************************************/
        //Ver el listado de usuarios
        Route::get('/users', 'UserController@index')->name('users.list');

        //Mostrar los detalles del usuario mandado usuario
        Route::get('/users/{id}', 'UserController@show')->where('id', '[0-9]+')->name('users.show');

        //Crear un usuario
        Route::get('/users/new', 'UserController@create')->name('users.create');

        //Editar un usuario
        Route::get('/users/{user}/edit', 'UserController@edit')->where('id', '[0-9]+')->name('users.edit');

        //Almacenar los datos del usuario
        Route::post('/users', 'UserController@store')->name('users.store');

        //Eliminar un usuario
        Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

        //Actualizar un usuario
        Route::put('/users/{user}', 'UserController@update')->name('users.update');

        //Restaurar un usuario
        Route::post('/users/restore', 'UserController@restore')->name('users.restore');
        /**************  Termina usuarios  ***************/

        
        Route::get('/reports/SRO/new', 'ReportsController@indexSinReglasOperacion')->name('reports.createSin');
        Route::get('/reports/RO/new', 'ReportsController@indexConReglasOperacion')->name('reports.createCon');
      
        
        Route::get('/applicants', 'ApplicantsController@index')->name('applicants.list');
        Route::get('/applicants/{id}', 'ApplicantsController@show')->where('id', '[0-9]+')->name('applicants.show');
        Route::get('/applicants/new', 'ApplicantsController@create')->name('applicants.create');
        Route::get('/applicants/createProject/{id}', 'ProjectsController@createProject')->where('id', '[0-9]+')->name('applicants.createProject');
        Route::get('/applicants/{id}/edit', 'ApplicantsController@edit')->where('id', '[0-9]+')->name('applicants.edit');
        Route::post('/applicants', 'ApplicantsController@store');
        Route::delete('/applicants/{applicant}', 'ApplicantsController@destroy')->name('applicants.destroy');
        Route::put('/applicants/{applicant}', 'ApplicantsController@update')->name('applicants.update');
        
      
        Route::get('/projects', 'ProjectsController@index')->name('projects.list');
        Route::get('/projects/{id}', 'ProjectsController@show')->where('id', '[0-9]+')->name('projects.show');
        Route::get('/projects/new', 'ProjectsController@create')->name('projects.create');
        Route::get('/projects/{id}/create_folio', 'ProjectsController@create_folio')->where('id', '[0-9]+')->name('projects.create_folio');
        Route::put('/projects/{id}/new_folio', 'ProjectsController@store_create_folio')->name('projects.store_create_folio');
        Route::get('/projects/{id}/edit', 'ProjectsController@edit')->where('id', '[0-9]+')->name('projects.edit');
        Route::post('/projects', 'ProjectsController@store');
        Route::delete('/projects/{project}', 'ProjectsController@destroy')->name('projects.destroy');
        Route::put('/projects/{id}', 'ProjectsController@update')->name('projects.update');
        Route::get('/projects/{id}/deleteDocument', 'ProjectsController@deleteDocumento')->name('projects.deleteDocumento');
      
        Route::get('/programs', 'ProgramsController@index')->name('programs.list');  
        Route::get('/programs/{id}', 'ProgramsController@show')->where('id', '[0-9]+')->name('programs.show');
        Route::get('/programs/new', 'ProgramsController@create')->name('programs.create');
        
        Route::get('/programs/{id}/deleteAnexo', 'ProgramsController@deleteAnexo')->name('programs.deleteAnexo');
        Route::get('/programs/WithRulesOperation/new', 'ProgramsController@createWithRulesOperation')->name('programs.createWithRulesOperation');
        Route::get('/programs/WithoutRulesOperation/new', 'ProgramsController@createWithoutRulesOperation')->name('programs.createWithoutRulesOperation');
        
        Route::post('/programs/WithRulesOperation/new', 'ProgramsController@storeWithRulesOperation')->name('programs.storeWithRulesOperation');
        Route::post('/programs/WithoutRulesOperation/new', 'ProgramsController@storeWithoutRulesOperation')->name("programs.storeWithoutRulesOperation");
      
        Route::get('/programs/{program}/edit', 'ProgramsController@edit')->where('id', '[0-9]+')->name('programs.edit');
        Route::post('/programs', 'ProgramsController@store');
        Route::delete('/programs/{program}', 'ProgramsController@destroy')->name('programs.destroy');
        Route::put('/programs/{program}', 'ProgramsController@update')->name('programs.update');
        
      
        Route::get('/concepts', 'ConceptsController@index')->name('concepts.list');  
        Route::get('/concepts/{id}', 'ConceptsController@show')->where('id', '[0-9]+')->name('concepts.show');
        Route::get('/concepts/new', 'ConceptsController@create')->name('concepts.create');
        Route::get('/concepts/{id}/edit', 'ConceptsController@edit')->where('id', '[0-9]+')->name('concepts.edit');
        Route::post('/concepts', 'ConceptsController@store');
        Route::delete('/concepts/{concept}', 'ConceptsController@destroy')->name('concepts.destroy');
        Route::put('/concepts/{concept}', 'ConceptsController@update')->name('concepts.update');
      
      
        Route::get('/components', 'ComponentController@index')->name('components.list');
        Route::get('/components/{id}', 'ComponentController@show')->where('id', '[0-9]+')->name('components.show');
        Route::get('/components/new', 'ComponentController@create')->name('components.create');
        Route::get('/components/{component}/edit', 'ComponentController@edit')->where('id', '[0-9]+')->name('components.edit');
        Route::post('/components', 'ComponentController@store');
        Route::delete('/components/{component}', 'ComponentController@destroy')->name('components.destroy');
        Route::put('/components/{component}', 'ComponentController@update')->name('components.update');
      
        Route::get('/subcomponents', 'SubcomponentController@index')->name('subcomponents.list');
        Route::get('/subcomponents/{id}', 'SubcomponentController@show')->where('id', '[0-9]+')->name('subcomponents.show');
        Route::get('/subcomponents/new', 'SubcomponentController@create')->name('subcomponents.create');
        Route::get('/subcomponents/{subcomponent}/edit', 'SubcomponentController@edit')->where('id', '[0-9]+')->name('subcomponents.edit');
        Route::post('/subcomponents', 'SubcomponentController@store');
        Route::delete('/subcomponents/{subcomponent}', 'SubcomponentController@destroy')->name('subcomponents.destroy');
        Route::put('/subcomponents/{subcomponent}', 'SubcomponentController@update')->name('subcomponents.update');
       
        Route::get('/glosario', 'GlosarioController@index')->name('glosario.list');
        Route::get('/glosario/{id}', 'GlosarioController@show')->where('id', '[0-9]+')->name('glosario.show');
        Route::get('/glosario/new', 'GlosarioController@create')->name('glosario.create');
        Route::get('/glosario/{word}/edit', 'GlosarioController@edit')->where('id', '[0-9]+')->name('glosario.edit');
        Route::post('/glosario', 'GlosarioController@store');
        Route::delete('/glosario/{word}', 'GlosarioController@destroy')->name('glosario.destroy');
        Route::put('/glosario/{word}', 'GlosarioController@update')->name('glosario.update');
      
        Route::get('/sessions', 'LogController@indexSessions')->name('log.sessionlist');
        Route::get('/sessions/{id}', 'LogController@showSession')->where('id', '[0-9]+')->name('sessions.show');
        Route::get('/movements', 'LogController@indexMovements')->name('log.movementslist');
        Route::get('/movements/{id}', 'LogController@showMovement')->where('id', '[0-9]+')->name('movements.show');
      
        
        Route::get('programs/downloadAnexo/{id}','ProgramsController@downloadAnexo');      
        Route::get('programs/downloadGeneral/{id}','ProgramsController@downloadGeneral');
        Route::get('programs/downloadSpecific/{id}','ProgramsController@downloadSpecific');
        Route::get('programs/downloadConvocatoria/{id}','ProgramsController@downloadConvocatoria'); 
        Route::get('component/download/{id}','ComponentController@download');
        Route::get('subcomponent/download/{id}','SubcomponentController@download');
        Route::get('applicant/download/{id}','ApplicantsController@download');
        Route::get('concept/download/{id}','ConceptsController@download');
        Route::get('/cities/{id}', 'ApplicantsController@getCities');
        Route::get('/documents/download/{id}','ProjectsController@download');
    });


    Route::group(['middleware'=>['access:1,2']], function(){
       
      Route::get('/movements', 'LogController@indexMovements')->name('log.movementslist');
      
    });

    Route::group(['middleware'=>['access:1,2']], function(){
        
        Route::get('/cities/{id}', 'ApplicantsController@getCities');
        Route::get('/components/getComponents/{id}', 'ProjectsController@getComponents');
        Route::get('/subcomponents/getSubComponents/{id}', 'ProjectsController@getSubComponents');
        Route::get('/concepts/getConcepts/{id}', 'ProjectsController@getConcepts');
        Route::get('/programs/getPrograms/{id}', 'ProjectsController@getPrograms');

    });

    

});
