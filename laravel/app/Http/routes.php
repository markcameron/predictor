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

Route::get('/', 'HomeController@index');

Route::get('login/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\AuthController@handleProviderCallback');

Route::resource('matches', 'MatchesController', [
    'only' => ['index', 'show']
]);

Route::resource('predictions', 'PredictionsController', [
    'only' => ['index', 'update']
]);

Route::resource('leaderboards', 'LeaderboardsController', [
    'only' => ['index']
]);

Route::resource('admin/matches', 'Admin\MatchesController', [
    'only' => ['index', 'edit', 'update']
]);

Route::resource('admin/goals', 'Admin\GoalsController', [
    'only' => ['create', 'store', 'edit', 'update']
]);

Route::auth();
