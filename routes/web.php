<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
})->name('all-tasks');

Route::get('/today', function(){
    return view('today');
})->name('today');

Route::get('/calendar', function(){
    return 'calendar';
})->name('calendar');

Route::get('/settings', function(){
    return 'Settings';
})->name('settings');

Route::get('/logout', function(){
    return 'logout';
})->name('logout');