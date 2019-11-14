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
Route::get('/', 'ApiController@index')->name('index.page'); 
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/next/{ind}', 'ApiController@nextPage')->name('index.next.page');
// Route::get('/prev/{ind}', 'ApiController@prevPage')->name('index.prev.page');

// Route::get('/ajax', [
// 	'uses'=>'ApiController@ajax',
// 	'url'=>Input::get('url')
// ])->name('ajax.request');