<?php

use App\Http\Controllers\transaksimeeting;
use Illuminate\Support\Facades\Auth;
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

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/minutes', 'transaksimeeting@index')->name('minutes');

Route::get('/MoM', function () {
    return view('MoM');
})->name('MoM');

Route::post('/fetch', 'InputController@fetch')->name('input.fetch');

Route::get('/input', 'transaksimeeting@create')->name('input');

Route::get('/edit', function () {
    return view('edit');
})->name('edit');

Route::get('/info', function () {
    return view('info');
})->name('info');

Route::post('/insert', 'transaksimeeting@store')->name('transaksi.insert');
Route::get('delete/{id}', 'transaksimeeting@delete')->name('delete');
Route::get('minutes/{id}', 'transaksimeeting@edit');
Route::get('info/{id}', 'transaksimeeting@info')->name('transaksi.info');
Route::post('update/{id}', 'transaksimeeting@update')->name('transaksi.update');
Route::get('/input', 'InputController@index');
