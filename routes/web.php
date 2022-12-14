<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AlertsController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use phpDocumentor\Reflection\Types\Resource_;

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

Route::get('/', [WelcomeController::class, 'home'])->name('welcomePage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('slides', SlidesController::class)->middleware('auth');
Route::resource('alerts',  AlertsController::class)->middleware('auth');
Route::resource('users',  UsersController::class)->middleware('auth');

Route::get('/profile',  [ProfileController::class, 'profile'])->middleware('auth')->name('profile');
Route::get('/profile/change-password',  [ProfileController::class, 'changePassword'])->middleware('auth')->name('changePassword');
Route::post('/profile/change-password',  [ProfileController::class, 'updatePassword'])->middleware('auth')->name('updatePassword');
Route::post('/profile/update-profile',  [ProfileController::class, 'updateProfile'])->middleware('auth')->name('updateProfile');

Route::get('/page-not-found',function (){ abort(404); });
