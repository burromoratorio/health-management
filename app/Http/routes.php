<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return redirect('/startup');
});

Route::resource('startup', 'StartupController');
Route::resource('autenticar', 'StartupController@AutenticateUser');
*/

Route::auth();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/',     ['as'=> 'home.index', 'uses' => 'StartupController@index' ]);
    Route::get('/home', ['as'=> 'home.index', 'uses' => 'StartupController@AutenticateUser' ]);
    
    
    //CRUD
    Route::post('usuarios',          [ 'middleware'=>['permission:usuarios-crear'],    'as'=> 'usuarios.store',   'uses' => 'UserController@store' ]);
    Route::get('usuarios',           [ 'middleware'=>['permission:usuarios-ver'],      'as'=> 'usuarios.index',   'uses' => 'UserController@index' ]);
    Route::get('usuarios/create',    [ 'middleware'=>['permission:usuarios-crear'],    'as'=> 'usuarios.create',  'uses' => 'UserController@create' ]);
    Route::get('usuarios/{id}',      [ 'middleware'=>['permission:usuarios-ver'],      'as'=> 'usuarios.show',    'uses' => 'UserController@show' ]);
    Route::patch('usuarios/{id}',    [ 'middleware'=>['permission:usuarios-editar'],   'as'=> 'usuarios.update',  'uses' => 'UserController@update' ]);
    Route::delete('usuarios/{id}',   [ 'middleware'=>['permission:usuarios-eliminar'], 'as'=> 'usuarios.destroy', 'uses' => 'UserController@delete' ]);
    Route::get('usuarios/{id}/edit', [ 'middleware'=>['permission:usuarios-ver'],      'as'=> 'usuarios.edit',    'uses' => 'UserController@edit' ]);

    Route::post('roles',          [ 'middleware'=>['permission:roles-crear'],    'as'=> 'roles.store',   'uses' => 'RolController@store' ]);
    Route::get('roles',           [ 'middleware'=>['permission:roles-ver'],      'as'=> 'roles.index',   'uses' => 'RolController@index' ]);
    Route::get('roles/create',    [ 'middleware'=>['permission:roles-crear'],    'as'=> 'roles.create',  'uses' => 'RolController@create' ]);
    Route::get('roles/{id}',      [ 'middleware'=>['permission:roles-ver'],      'as'=> 'roles.show',    'uses' => 'RolController@show' ]);
    Route::patch('roles/{id}',    [ 'middleware'=>['permission:roles-editar'],   'as'=> 'roles.update',  'uses' => 'RolController@update' ]);
    Route::delete('roles/{id}',   [ 'middleware'=>['permission:roles-eliminar'], 'as'=> 'roles.destroy', 'uses' => 'RolController@delete' ]);
    Route::get('roles/{id}/edit', [ 'middleware'=>['permission:roles-ver'],      'as'=> 'roles.edit',    'uses' => 'RolController@edit' ]);

    Route::post('modulos',          [ 'middleware'=>['permission:modulos-crear'],    'as'=> 'modulos.store',   'uses' => 'ModuleController@store' ]);
    Route::get('modulos',           [ 'middleware'=>['permission:modulos-ver'],      'as'=> 'modulos.index',   'uses' => 'ModuleController@index' ]);
    Route::get('modulos/create',    [ 'middleware'=>['permission:modulos-crear'],    'as'=> 'modulos.create',  'uses' => 'ModuleController@create']);
    Route::get('modulos/{id}',      [ 'middleware'=>['permission:modulos-ver'],      'as'=> 'modulos.show',    'uses' => 'ModuleController@show' ]);
    Route::patch('modulos/{id}',    [ 'middleware'=>['permission:modulos-editar'],   'as'=> 'modulos.update',  'uses' => 'ModuleController@update' ]);
    Route::delete('modulos/{id}',   [ 'middleware'=>['permission:modulos-eliminar'], 'as'=> 'modulos.destroy', 'uses' => 'ModuleController@destroy' ]);
    Route::get('modulos/{id}/edit', [ 'middleware'=>['permission:modulos-ver'],      'as'=> 'modulos.edit',    'uses' => 'ModuleController@edit' ]);

    Route::post('permisos',          [ 'middleware'=>['permission:permisos-crear'],    'as'=> 'permisos.store',   'uses' => 'PermissionController@store' ]);
    Route::get('permisos',           [ 'middleware'=>['permission:permisos-ver'],      'as'=> 'permisos.index',   'uses' => 'PermissionController@index' ]);
    Route::get('permisos/create',    [ 'middleware'=>['permission:permisos-crear'],    'as'=> 'permisos.create',  'uses' => 'PermissionController@create']);
    Route::get('permisos/{id}',      [ 'middleware'=>['permission:permisos-ver'],      'as'=> 'permisos.show',    'uses' => 'PermissionController@show' ]);
    Route::patch('permisos/{id}',    [ 'middleware'=>['permission:permisos-editar'],   'as'=> 'permisos.update',  'uses' => 'PermissionController@update' ]);
    Route::delete('permisos/{id}',   [ 'middleware'=>['permission:permisos-eliminar'], 'as'=> 'permisos.destroy', 'uses' => 'PermissionController@destroy' ]);
    Route::get('permisos/{id}/edit', [ 'middleware'=>['permission:permisos-ver'],      'as'=> 'permisos.edit',    'uses' => 'PermissionController@edit' ]);

    Route::post('seguridad/create', [ 'middleware'=>['permission:seguridad-crear'], 'as'=> 'seguridad.create', 'uses' => 'PermissionRoleController@store' ]);
    Route::get('seguridad',         [ 'middleware'=>['permission:seguridad-ver'],   'as'=> 'seguridad.index',  'uses' => 'PermissionRoleController@index' ]);

    Route::post('menus/store', [ 'middleware'=>['permission:menus-crear'], 'as'=> 'menus.store', 'uses' => 'MenuController@store' ]);
    Route::get('menus',        [ 'middleware'=>['permission:menus-ver'],   'as'=> 'menus.index', 'uses' => 'MenuController@index' ]);

    Route::get('/perfiles/{username}',          [ 'as' => 'perfiles.index',  'uses' => 'ProfileController@index' ]);
    Route::get('/perfiles/{username}/edit',     [ 'as' => 'perfiles.edit',   'uses' => 'ProfileController@edit' ]);
    Route::post('/perfiles/{username}/image',   [ 'as' => 'perfiles.image',  'uses' => 'ProfileController@image' ]);
    Route::patch('/perfiles/{username}/update', [ 'as' => 'perfiles.update', 'uses' => 'ProfileController@update' ]);

});
