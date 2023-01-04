<?php

use App\Http\Controllers\ActivityController;
<<<<<<< HEAD
use App\Http\Controllers\BulletinController;
=======
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
>>>>>>> 4e54dc304f6000aaa8978c7dbcca18fa560e0015
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

<<<<<<< HEAD
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Route::get('/dashboard', [DashboardController::class, 'index']);
>>>>>>> 4e54dc304f6000aaa8978c7dbcca18fa560e0015

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/homepage', function(){
    return view('homepage');
});

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| Manage Bulletin
|--------------------------------------------------------------------------
|
*/

=======

Route::controller(ActivityController::class)->group(function(){
    // general page
    Route::get('/activity', 'index')->name('activity.page');
    Route::get('/showactivity/{id}', 'show')->name('activity.show');
    // user page
    // Route::get('/deleteactivity', 'deleteActivity')->name('delete.activity');
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
>>>>>>> 4e54dc304f6000aaa8978c7dbcca18fa560e0015

