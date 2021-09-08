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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\FrontEndController@home')->name('website');

Auth::routes();

// if (\App\Models\User()->count() < 1) {
//     Auth::routes();
// } else {
//     Auth::routes(['register' => false]);
// }
// Admin Panel Routes
Route::group(['prefix' => 'admin'], function  () {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::resource('masthead', 'App\Http\Controllers\MastheadController');
    Route::resource('about', 'App\Http\Controllers\AboutController');
    Route::resource('service', 'App\Http\Controllers\ServiceController');
    Route::resource('portfolio', 'App\Http\Controllers\PortfolioController');
    Route::resource('cv', 'App\Http\Controllers\CvController');
    Route::resource('setting', 'App\Http\Controllers\SettingController');
    Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
    Route::post('/profile', 'App\Http\Controllers\UserController@profile_update')->name('user.profile.update');

    // // setting
    // Route::get('setting', 'App\Http\Controllers\SettingController@edit')->name('setting.index');
    // Route::post('setting', 'App\Http\Controllers\SettingController@update')->name('setting.update');

    // Contact message
    Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');
    Route::get('/contact/show/{id}', 'App\Http\Controllers\ContactController@show')->name('contact.show');
    Route::delete('/contact/delete/{id}', 'App\Http\Controllers\ContactController@destroy')->name('contact.destroy');
});
