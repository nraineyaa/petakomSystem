<?php

use App\Http\Controllers\ActivityController;
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


// Route::get('/testactivity', function(){
//     return view('activity.activity');
// });

Route::get('/homepage', function(){
    return view('homepage');
});


Route::controller(ActivityController::class)->group(function(){
    Route::get('/activity', 'index')->name('activity.page');
    Route::get('/showactivity', 'show')->name('activity.show');
    Route::get('/activity-login', 'showActivity')->name('activity.login');
    Route::get('/createactivity', 'createActivity')->name('create.activity');
    Route::get('/editactivity', 'editActivity')->name('edit.activity');
});