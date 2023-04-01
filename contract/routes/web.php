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

// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return view('welcome');
});


// Migrate Fresh:
Route::get('/migrate-seed', function() {
    Artisan::call('migrate:fresh --seed');
    return view('welcome');
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return view('welcome');
});


Route::get('/link', function () {
    Artisan::call('storage:link');
    return view('welcome');
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return view('welcome');
});
