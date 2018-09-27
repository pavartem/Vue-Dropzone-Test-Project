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

Route::get('/test', function()
{
    $img = Image::canvas(800, 600, '#ccc')->resize(500,500)->insert('watermark.png');;

    return $img->response('jpg');
});

Route::post('/watermark', 'ImageController@create')->name('watermark.create');
Route::post('/text', 'ImageController@getText')->name('watermark.getText');
