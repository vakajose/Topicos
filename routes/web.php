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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('getcategorias','WebServiceController@getCategorias');
Route::get('getcategoriacode','WebServiceController@getcategoriacode');
Route::post('enviarreclamo','WebServiceController@crearReclamo');

Route::resource('categoria', 'CategoriaController')->parameters([
    'categoria' => 'categoria'
]);
Route::resource('reclamo', 'ReclamoController')->parameters([
    'reclamo' => 'reclamo'
]);
Route::name('estadisticas.show')->get('estadisticas', 'EstadisticaController@show');
