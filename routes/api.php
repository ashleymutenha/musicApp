<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FavouriteArtistController;
use App\Http\Controllers\FavouriteAlbumController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('/auth/google/call-back',[GoogleAuthController::class ,'callbackGoogle'])->name('google-callback');


Route::get('/getUsername', [GoogleAuthController::class, 'getCurrentSessionCredential'])->name('getUsername');
Route::post('/saveFavArtist',[FavouriteArtistController::class, 'saveFavouriteArtist'])->name('savefavArtist');
Route::post('/getFavArtists',[FavouriteArtistController::class, 'getFavouriteArtists'])->name('getfavArtist');

Route::post('/saveFavAlbum',[FavouriteAlbumController::class, 'saveFavouriteAlbum'])->name('savefavAlbum');
Route::post('/getFavAlbums',[FavouriteAlbumController::class, 'getFavouriteAlbums'])->name('getfavAlbums');