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

    Route::get('/calendar', 'CalendarController@index');
    Route::get('/calendar/edit', 'CalendarController@edit');

    // Display events for a specific date
    Route::get('/calendar/{date}', 'CalendarController@showEvents')->name('calendar.show');
    // Add a new event for a specific date
    Route::get('/calendar/{date}/add', 'CalendarController@addEvent')->name('calendar.add');
    // Edit an existing event for a specific date
    Route::get('/calendar/{date}/{eventName}/edit', 'CalendarController@editEvent')->name('calendar.edit');


    Route::get('/faq', function () {
        return view('faq');
    });
});
