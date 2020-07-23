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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/athletes', 'AthleteController@index');
Route::get('/athletes/{athlete}', 'AthleteController@show');
Route::post('/athletes', 'AthleteController@store');

Route::get('/physicals', 'PhysicalController@index');
Route::get('/physicals/{physical}', 'PhysicalController@show');
Route::post('/physicals', 'PhysicalController@store');

//Route::get('/physicals-partial', function () {
//    return view('physicals.physicals-partial', [
//        'physicals' => \App\Models\Physical::search(
//            request('search')
//        )->get()
//    ]);
//});