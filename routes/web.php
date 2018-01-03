<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('docente/tipodocente','TipoDocenteController');

Route::resource('docente/docente','DocenteController');

Route::resource('unidad/unidad','UnidadController');

Route::resource('tema/tema','TemaController');

Route::resource('asignatura/asignatura','AsignaturaController');

Route::resource('grado/grado','GradoController');

Route::resource('aplicaciones/aplicaciones','AppsDocenteController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');
