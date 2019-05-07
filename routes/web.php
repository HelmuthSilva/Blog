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
    return view('index');
});

Route::get('/publicar', function(){
    return view('publicar');
});

Auth::routes();

Route::post('criar_postagem', 'PostagensController@store');
Route::get('/home', 'HomeController@index')->name('home');
//Rotas de postagem
Route::post('store_postagem', 'PostagensController@store');
Route::get('/ver_post/{id}', 'PostagensController@show');
Route::get('/excluir_postagem/{id}', 'PostagensController@destroy');
Route::get('editar_postagem/{id}', 'PostagensController@edit');
Route::post('/update_postagem/{id}', 'PostagensController@update');
Route::get('/mostrar_postagens', 'PostagensController@index');

//Rotas de comentários
Route::post('criar_comentario/{id}', 'ComentariosController@store');
Route::get('/post_comentario/{id}', 'ComentariosController@show');
Route::get('/excluir_comentario{id}', 'ComentariosController@destroy');
Route::get('/editar_comentario{id}', 'ComentariosController@edit');
Route::post('update_comentario/{id}', 'ComentariosController@update');
