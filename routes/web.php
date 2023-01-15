<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('/homepage', function(){
    return view('homepage');
});

Route::controller(ActivityController::class)->group(function(){ 
    Route::get('/activity', 'index')->name('activity.page');
    Route::get('/showactivity', 'show')->name('activity.show');
    Route::get('/showactivity_login', 'showActivity')->name('activity.login');
    Route::get('/createactivity', 'createActivity')->name('activity.create');
    Route::get('/editactivity', 'editActivity')->name('activity.edit');
});

Route::controller(UserController::class)->group(function(){ 
    Route::get('/myProfile', 'index')->name('myProfile.page');
    Route::get('/userList', 'userList')->name('userList.page');
    Route::get('/showactivity_login', 'showActivity')->name('activity.login');
    Route::get('/createactivity', 'createActivity')->name('activity.create');
    Route::get('/editactivity', 'editActivity')->name('activity.edit');
});

Route::controller(App\Http\Controllers\ElectionController::class)->group(function(){
    Route::get('/studList', 'vote')->name('election.student.studList');
    Route::get('/register', 'register')->name('election.student.register');
    Route::get('/registration', 'registration')->name('election.student.registration');
    Route::get('/updateReg', 'updateReg')->name('election.student.updateReg');
    Route::get('/comList', 'comList')->name('election.committee.comList');
    Route::get('/comInfo', 'comInfo')->name('election.committee.comInfo');
    Route::get('/hosdList', 'hosdList')->name('election.hosd.hosdList');
    Route::get('/hosdInfo', 'hosdInfo')->name('election.hosd.hosdInfo');

    Route::post('/store', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::get('/update', 'update')->name('update');
    Route::get('/approval/{id}', 'approval')->name('approval');
});
