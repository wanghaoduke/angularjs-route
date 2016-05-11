<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('indexnew');
});




Route::get('api/comments/{wen_id}',['uses'=>'WenController@showComm','as'=>'showComm']);
Route::post('api/comments/{wen_id}',['uses'=>'WenController@storeComm','as'=>'storeComm']);
Route::delete('api/comments/{id}',['uses'=>'WenController@destroyComm','as'=>'destroyComm']);
Route::get('api/wens/list/{wenList_id?}',['uses'=>'WenController@showWens','as'=>'showWens']);
Route::group(array('prefix'=>'api'),function (){
  Route::resource('wens','WenController',
    array('only'=>array('index','store','destroy','show')));

});


