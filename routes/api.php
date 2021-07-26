<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('password', function(){
    return bcrypt('mengas');
});

Route::get('/Olahraga', 'OlahragaController@index');
Route::get('/Olahraga/{olahraga}', 'OlahragaController@show');
Route::post('/Olahraga', 'OlahragaController@store');
Route::delete('/Olahraga/{olahraga}', 'OlahragaController@destroy');
Route::post('/Olahraga/{olahraga}', 'OlahragaController@update');

Route::get('/Atlit', 'AtlitController@index');
Route::get('/Atlit/{atlit}', 'AtlitController@show');
Route::post('/Atlit', 'AtlitController@store');
Route::delete('/Atlit/{atlit}', 'AtlitController@destroy');
Route::post('/Atlit/{atlit}', 'AtlitController@update');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

