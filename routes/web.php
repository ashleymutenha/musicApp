<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/call-back',[GoogleAuthController::class ,'callbackGoogle'])->name('google-callback');
Route::get('http://localhost:3000/home')->name('frontend');
Route::get('/getUsername', [GoogleAuthController::class, 'getCurrentSessionCredential'])->name('getUsername');