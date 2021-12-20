<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth']
    ], function () {

    Route::get('/', function () { return view('index');});

//====================================Start user$Roles==========================================================
    Route::resource('roles',\App\Http\Controllers\RoleController::class);
    Route::resource('users',\App\Http\Controllers\UserController::class);
    Route::get('users/show_users',[\App\Http\Controllers\UserController::class,'index']);
//====================================end user $ Roles==========================================================


//====================================start Notifications==========================================================
    Route::get('MarkAsRead_all',[\App\Http\Controllers\UserController::class,'MarkAsRead_all'])->name('MarkAsRead_all');
    Route::get('unreadNotifications_count', [\App\Http\Controllers\UserController::class,'unreadNotifications_count']);
    Route::get('unreadNotifications', [\App\Http\Controllers\UserController::class,'unreadNotifications']);
//====================================end Notifications==========================================================

    Route::get('/{page}', [\App\Http\Controllers\AdminController::class,'index']);
});

