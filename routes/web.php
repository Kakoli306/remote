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

use App\Developer;
use App\Http\Resources\Developer as DeveloperResource;
use App\Http\Resources\DeveloperCollection;

Route::get('/', function () {
    $developers = \App\Developer::all();

    return view('welcome')->with('developers',$developers);
});

Route::post('/search', 'WelcomeController@search');

Route::get('/json', function (){
$developers = Developer::all();
 return new DeveloperCollection($developers);
});

Route::post('/developer/developer-list_with_details','ApiController@DeveloperDetails');
Route::get('/developer/get/developer-list_with_details','ApiController@getDeveloperDetails');

