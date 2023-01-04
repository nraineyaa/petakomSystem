<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('landingpage');
});

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/homepage', function(){
    return view('homepage');
});


Route::controller(ActivityController::class)->group(function(){
    // general page
    Route::get('/activity', 'index')->name('activity.page');
    Route::get('/showactivity/{id}', 'show')->name('activity.show');
    Route::get('/showactivity_login', 'showActivity')->name('activity.login');
    Route::get('/createactivity', 'createActivity')->name('activity.create');
    Route::get('/editactivity/{id}', 'editActivity')->name('activity.edit');
    Route::get('/proposeactivity/{id}', 'proposeActivity')->name('propose.activity');
    Route::get('/petakompage', 'activityProposed')->name('petakom.page');
    Route::post('storeactivity', 'store')->name('store.activity');
    Route::post('/updateactivity/{id}', 'update')->name('update.activity');
    Route::post('/deleteactivity/{id}', 'destroy')->name('destroy.activity');
    Route::get('/approveActivity/{id}', 'approveActivity')->name('propose.approve');
    Route::get('/rejectActivity/{id}', 'rejectActivity')->name('propose.reject');

});

