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



Route::get('/Painel/Servidores', 'Painel\Servidores\ServidoresController@index')->name('servidores.index');
Route::get('/Painel/Servidores/lista', 'Painel\Servidores\ServidoresController@viewServidores')->name('servidores.lista');
Route::get('/Painel/Servidores/create', 'Painel\Servidores\ServidoresController@create')->name('Painel.Servidores.create');
Route::post('/Painel/Servidores/store', 'Painel\Servidores\ServidoresController@store')->name('servidores.store');
Route::get('/Painel/Servidores/edit/{id}', 'Painel\Servidores\ServidoresController@edit')->name('servidores.edit');
Route::patch('/Painel/Servidores/lista/{id}', 'Painel\Servidores\ServidoresController@update')->name('servidores.update');
Route::get('/Painel/Servidores/lista/{id}', 'Painel\Servidores\ServidoresController@destroy')->name('servidores.destroy');


Route::get('/Painel/Usuarios', 'Painel\PainelController@viewUsuarios')->name('Painel.Usuarios.index');
Route::get('/Painel/Usuarios/create', 'Painel\Usuarios\UsuariosController@create')->name('Painel.Usuarios.create');
Route::post('/Painel/Usuarios/store', 'Painel\Usuarios\UsuariosController@store')->name('usuarios.store');
Route::get('/Painel/Usuarios/edit/{id}', 'Painel\Usuarios\UsuariosController@edit')->name('usuarios.edit');
Route::patch('/Painel/Usuarios/{id}', 'Painel\Usuarios\UsuariosController@update')->name('usuarios.update');
Route::get('/Painel/Usuarios/{id}', 'Painel\Usuarios\UsuariosController@destroy')->name('usuarios.destroy');

Route::get('/teste', 'Painel\Jobs\JobController@tempoRestante')->name('jobs.teste');

Route::get('/Painel/jobs', 'Painel\Jobs\JobController@index')->name('jobs.index');
Route::get('/Painel/jobs/create/{server_id}', 'Painel\Jobs\JobController@create')->name('jobs.create');
Route::post('/Painel/jobs/store', 'Painel\Jobs\JobController@store')->name('jobs.store');
Route::get('/Painel/jobs/edit/{id}', 'Painel\Jobs\JobController@edit')->name('jobs.edit');
Route::patch('/Painel/jobs/{id}', 'Painel\Jobs\JobController@update')->name('jobs.update');
Route::get('/Painel/jobs/{id}', 'Painel\Jobs\JobController@destroy')->name('jobs.destroy');


