<?php
use App\Mail\TestEmail;

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

Route::get('/galeria', 'PostagensController@galeria');

Route::get('/publicar', function(){
    return view('publicar');
});

Route::get('/w', function () {
    return view('welcome');
});

Route::get('/','HomeController@index')->name('home');


Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');


Route::get('/admin','AdminController@index')->name('adminInicial');
Route::get('/admin/publicacoes','AdminController@publicacoes');
Route::get('/admin/apagarPost/{$id}', 'AdminController@removePost');

Route::get('/admin/login','Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@index')->name('admin.login.submit');

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::post('criar_postagem', 'PostagensController@store');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ver_post/{id}', 'PostagensController@show');
//Rotas de postagem
Route::group(['middleware' => ['auth']], function() {
Route::post('store_postagem', 'PostagensController@store');
Route::get('/excluir_postagem/{id}', 'PostagensController@destroy');
Route::get('editar_postagem/{id}', 'PostagensController@edit');
Route::post('/update_postagem/{id}', 'PostagensController@update'); 
Route::get('/mostrar_postagens', 'PostagensController@index');

//Rotas de comentários
Route::get('/comentar/{id}', 'ComentariosController@create');
Route::post('/criar_comentario', 'ComentariosController@store');
Route::get('/post_comentario/{id}', 'ComentariosController@show');
Route::get('/excluir_comentario/{id}', 'ComentariosController@destroy');
Route::get('/editar_comentario/{id}', 'ComentariosController@edit');
Route::post('/update_comentario/{id}', 'ComentariosController@update');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/mensagem', 'HomeController@mensagem');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/testmail', function () {
    $data = ['message' => 'Testando essa merda!'];

    Mail::to('gabriel.jg04@gmail.com')->send(new TestEmail($data));
    return redirect('/');
})->name('testmail');

Route::post('/mensagem', 'MailController@enviarEmail');



