<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('web.index');
})->name('dashboard.user');


Route::middleware('auth:web')->prefix('user')->group(function(){

    Route::get('/contact', [ContactController::class , 'index'] )->name('contact');

});


