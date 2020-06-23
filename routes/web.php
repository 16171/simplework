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
Route::get('our', function () {
    return view('our');
});
Route::get('about', function () {
    return view('about');
});
Route::get('careers', function () {
    return view('careers');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('parse', function () {
    return view('parse');
});
Route::get('/','ProductController@getAll');
Auth::routes();

Route::group(['midleware'=>['auth']], function (){
    Route::get('parse','ParseController@getIndex');
    Route::post('/ajax/parse/onliner_product','ParseController@postProduct');
    Route::post('/ajax/parse/onliner_catalog','ParseController@postCatalog');


});
Route::get('catalog/{id}', 'ProductController@getCatalog');
Route::get('product/{id}', 'ProductController@getOne');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'BaseController@getIndex');
Route::post('home', 'HomeController@postIndex');
Route::get('home/delete/{id}', 'HomeController@getDelete');
Route::get('/best', 'BestController@getAll');
Route::post('ajax/modal','Ajax\ModalController@postIndex');
//always on end;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('upload', 'CKEditorController@upload') ->name('upload');
Route::get('{url}', 'MaintextController@getUrl');
