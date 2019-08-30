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

Route::get('/', ['uses' => 'UsuarioController@index']);

Route::get('/usuarios', ['as' => 'usuario.inicio', 'uses' => 'UsuarioController@index']);
Route::get('/nuevoUsuario', ['as' => 'usuario.nuevoUsuario', 'uses' => 'UsuarioController@create']);
Route::get('/editarUsuario/{usuario}', ['as' => 'usuario.editarUsuario', 'uses' => 'UsuarioController@edit'])->where('usuario', '[0-9]+');
Route::post('/actualizarUsuario', ['as' => 'usuario.actualizarUsuario', 'uses' => 'UsuarioController@update']);
Route::get('/eliminarUsuario/{usuario}', ['as' => 'usuario.eliminarUsuario', 'uses' => 'UsuarioController@destroy'])->where('usuario', '[0-9]+');
Route::post('/registrarUsuario', ['as' => 'usuario.registrarUsuario', 'uses' => 'UsuarioController@store']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
