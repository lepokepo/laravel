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

Route::get('/home', 'ProdutoController@prodGraph')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//                   venda
	Route::get('/vendas/nova', 'VendaController@nova')->name('venda.nova');

	//                adicionando
	Route::post('/produtos', 'ProdutoController@store')->name('produto.store');
	Route::get('/produtos/novo', 'ProdutoController@novo')->name('produto.novo');

	//                  editando
	Route::get('/produtos/edita/{prod}', 'ProdutoController@edita')->name('produto.edita');
	Route::put('/produtos/{produto}', 'ProdutoController@update')->name('produto.update');

	//                    misc
	Route::delete('/produtos/{produto}', 'ProdutoController@destroy')->name('produto.destroy');
	Route::get('/produtos/lista', 'ProdutoController@lista')->name('produto.lista');
});


Auth::routes();

Route::get('/home', 'ProdutoController@prodGraph')->name('home');
