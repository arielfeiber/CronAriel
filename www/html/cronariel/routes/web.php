<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Home\HomeController@index')->name('Home.index');

Route::get('/Painel', 'Painel\PainelController@index')->name('Painel.index');

Route::get('/Painel/Alertas', 'Painel\PainelController@viewAlertas')->name('Painel.Alertas.index');

Route::get('/Painel/Servidores', 'Painel\PainelController@viewServidores')->name('Painel.Servidores.index');
Route::get('/Painel/Servidores/create', 'Painel\Servidores\ServidoresController@create')->name('Painel.Servidores.create');
Route::post('/Painel/Servidores/store', 'Painel\Servidores\ServidoresController@store')->name('servidores.store');


Route::get('/Painel/Usuarios', 'Painel\PainelController@viewUsuarios')->name('Painel.Usuarios.index');
Route::get('/Painel/Usuarios/create', 'Painel\Usuarios\UsuariosController@create')->name('Painel.Usuarios.create');
Route::post('/Painel/Usuarios/store', 'Painel\Usuarios\UsuariosController@store')->name('usuarios.store');
Route::get('/Painel/Usuarios/edit', 'Painel\Usuarios\UsuariosController@edit')->name('usuarios.edit');
Route::put('/Painel/Usuarios/{usuario}', 'Painel\Usuarios\UsuariosController@update')->name('usuarios.update');
Route::delete('/Painel/Usuarios/{usuario}', 'Painel\Usuarios\UsuariosController@destroy')->name('usuarios.destroy');


