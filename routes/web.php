<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


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

Route::get('/',function (){
    return view('auth.login');
});
Auth::routes();

Route::get('/home','dashboard\HomeController@index')->name('dash.home');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){


    Route::prefix('dash')->middleware('auth')->namespace('dashboard')->name('dash.')->group(function (){

        Route::get('/','HomeController@index')->name('home');
        Route::resource('mechanic','MechanicController')->except('show');
        Route::resource('garage','GarageController')->except('show');
        Route::resource('car','CarController')->except('show');

    });

});



