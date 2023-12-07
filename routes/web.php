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

Route::get('/home', function () {
    $name = "abc";
    return view('hello',['name'=>$name]);
});

Route::get('/home1', function () {
    $name = "abc";
    return view('hello',compact('name'));
});

Route::get('/hello/{name?}/{surname?}/{year?}','HelloController@index')->name('hello')
    ->where('name','[a-z,A-Z]+')
    ->where('surname','[a-z,A-Z]+')
    ->where('year','[0-2023]+');

//Route::resource('table', 'TableController')->only('index');

Route::get('table/{n?}', 'TableController@index')->where('n', '[0-9]+');


*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function (){
    //Route::resource('actors','ActorController')->middleware('maintence');
    Route::resource('actors','ActorController');
});
