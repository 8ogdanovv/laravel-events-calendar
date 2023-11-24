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

Route::middleware(['redirect.to.calendar'])->group(function () {
    Route::get('/', function () {
        return view('main');
    });

    Route::get('/events', function () {
        return view('events');
    });

    Route::get('/calendar', 'Firebase\CalendarController@index');
    Route::get('/calendar/edit', 'Firebase\CalendarController@edit');

    Route::get('/faq', function () {
        return view('faq');
    });
});
