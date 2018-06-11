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

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('/raffle', function () {
    return view('pages.raffle');
})->middleware('auth')->name('raffle');

Route::get('/raffle/add', function () {
    return view('pages.add-ticket');
})->middleware('auth')->name('addTicket');

Route::get('/entrants', function () {
    return view('pages.entrants');
})->middleware('auth')->name('entrants');

Route::get('/winners', function () {
    return view('pages.raffle-winners');
})->middleware('auth')->name('winners');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
