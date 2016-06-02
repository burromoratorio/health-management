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

Route::get('/', function () {
    return redirect('/startup');
});

Route::resource('startup', 'StartupController');
Route::resource('autenticar', 'StartupController@AutenticateUser');
/*
 * 
 * Route::get('/cuentas', function () {
    return redirect('/upload');
});Route::post('subirArchivos', 'UploadController@subirArchivos');
Route::post('procesarArchivos', 'UploadController@procesarArchivos');
Route::get('/download/{filename}', 'UploadController@getDownload');
*7
