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

//Create landing page route
Route::get('/', function () {
    return view('pages.welcome');
});

//Create authorization routes
Auth::routes();

//Create custom routes
Route::get('/raffle', 'RaffleController@index')->name('raffle');
Route::get('/raffle/entrants', 'RaffleController@entrants')->name('raffle.entrants');
Route::get('/raffle/winners', 'RaffleController@winners')->name('raffle.winners');

//Create CRUD resource routes
Route::resource('raffle','RaffleController');

//Create home route
Route::get('/home', 'HomeController@index')->name('home');
