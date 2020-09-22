<?php

use Illuminate\Support\Facades\Route;
use App\Events\MessageCreated;
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

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/upload', 'HomeController@upload');
    Route::get('/bbs','BbsController@index')->name('bbs');
    Route::post('/bbs', 'BbsController@create');
    Route::post('/like/{bbs}','BbsController@like');
    Route::get('/single/{id}','BbsController@single')->name('single');
    Route::delete('/delete/{bbs}','BbsController@destroy');
    Route::get('/user/{id}','UserController@index');

    Route::get('/check', 'HomeController@check');
    Route::get('/download', 'HomeController@download');
    Route::get('/mail', 'MailSendController@send');

    Route::get('/users','UserController@export');

    Route::resource('/products','ProductsController');
});

Route::get('/env',function(){
    echo env('APP_NAME');
});
