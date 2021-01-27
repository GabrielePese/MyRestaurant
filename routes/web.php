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



Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/impostaTavoli', 'LoggedController@impostaTavoli')->name('impostaTavoli');
Route::post('/tavoliPost', 'LoggedController@tavoliPost')->name('tavoliPost');
Route::post('/controlloTavoli', 'LoggedController@controlloTavoli')->name('controlloTavoli');
Route::get('/inserisciNomiClienti/data', 'LoggedController@inserisciNomiClienti')->name('inserisciNomiClienti');
Route::post('/salvaNomiClienti/data', 'LoggedController@salvaNomiClienti')->name('salvaNomiClienti');
Route::get('/visualizzaStatistiche', 'LoggedController@visualizzaStatistiche')->name('visualizzaStatistiche');
Route::post('/controlloNomeCognome', 'LoggedController@controlloNomeCognome')->name('controlloNomeCognome');


