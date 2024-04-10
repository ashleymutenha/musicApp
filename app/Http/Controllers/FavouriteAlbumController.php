<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\favouritealbum;

class FavouriteAlbumController extends Controller
{

// function to get User Favourite Albums
    public function getFavouriteAlbums(Request $request){

        try {
            $favAlbums = favouritealbum::where(["username"=>$request->username])->get();

        $responseData = (["message"=>"success", "data"=>$favAlbums]);

        return response($responseData,200);

        } catch (\Throwable $th) {
          
            $responseData = (["message"=>"failure"]);

        return response($responseData,300);
        }

    }

    // function to save User Favourite Albums to database

    public function saveFavouriteAlbum(Request $request){

    //   try {
        $fav_artist = favouritealbum::create([
            'username'=>$request->username,
            'artist'=>$request->artist,
            'album'=>$request->album,
        ]);
        $responseData = (["message"=>"success"]);

        return response($responseData,200);
    //   } catch (\Throwable $th) {

    //     $responseData = (["message"=>"failure"]);

    //     return response($responseData,300);
    //   }


    }
}
