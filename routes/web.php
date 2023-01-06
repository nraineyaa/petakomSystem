<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BulletinController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index']);


// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/homepage', [HomeController::class, 'homepage']);

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

//----------------------------- BULLETIN MODULE ----------------------------//
Route::controller(BulletinController::class)->group(function(){

    //----------------------------- USER EXCEPT PETAKOM ----------------------------//
    //get page bulletin for users
    Route::get('/bulletinUserPage', 'indexUser');

    //show bulletin news in full details
    Route::get('/bulletin/{id}/show','showNewsUser');

    //search news by title or author name
    Route::get('/searchNewsUser','searchNewsUser');

    //---------------------------------- PETAKOM -----------------------------------//
    Route::prefix('committee')->middleware(['auth','isPetakom'])->group(function()
    {
        //get page bulletin for petakom committee
        Route::get('/bulletin', 'indexPetakom');

        //create new news
        Route::get('/create', function (){ return view('buletin.addNews'); });

        //insert new news
        Route::post('/bulletin/store', 'storeNews');

        //search news by title or author name
        Route::get('/searchNewsPetakom','searchNewsPetakom');

        //show bulletin news in full details
        Route::get('/bulletin/{id}/show','showNews');

        //edit news form
        Route::get('/bulletin/{id}/edit','editNews');

        //update news
        Route::post('/bulletin/{id}/update','updateNews');

        //delete news
        Route::get('/bulletin/{id}/delete','deleteNews');
    });
});

