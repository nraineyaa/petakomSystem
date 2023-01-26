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
    Route::get('/registerUser', 'registerUser')->name('registerUser');
    Route::post('/addUser', 'addUser')->name('addUser');
    Route::delete('/deleteUser/{id}', 'deleteUser')->name('deleteUser');
    Route::get('/editUser/{id}', 'editUser')->name('editUser');
    Route::post('/updateUser/{id}', 'updateUser')->name('updateUser');
    Route::post('/updateAvatar', 'updateAvatar')->name('updateAvatar');
    Route::post('/updateProfile/{id}', 'updateProfile')->name('updateProfile');
    Route::post('/updatePassword', 'updatePassword')->name('updatePassword');
});

//route for election controller
Route::controller(App\Http\Controllers\ElectionController::class)->group(function(){
    Route::get('/studList', 'vote')->name('election.studList');
    Route::get('/register', 'register')->name('election.register');
    Route::get('/registration', 'registration')->name('election.registration');
    Route::get('/updateReg/{id}', 'updateReg')->name('election.updateReg');
    Route::get('/comList', 'comList')->name('election.comList');
    Route::get('/comInfo/{id}', 'comInfo')->name('election.comInfo');
    Route::get('/coorList', 'coorList')->name('election.coorList');
    Route::get('/coorInfo/{id}', 'coorInfo')->name('election.coorInfo');

    Route::post('/store', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('/approval/{id}', 'approval')->name('approval');
    Route::get('/reject/{id}', 'reject')->name('reject');
    Route::get('/voter/{id}', 'voter')->name('voter');
});
