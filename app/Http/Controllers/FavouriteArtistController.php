<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favouriteartist;

class FavouriteArtistController extends Controller
{
  
       // function to get User Favourite Artists  from database

    public function getFavouriteArtists(Request $request){
        try {
            $myFaves = favouriteartist::where('username', $request->username)->get();
            $responseData = (["data"=>$myFaves, "message"=>"success"]);
            return response($responseData, 200);
        } catch (\Throwable $th) {
            $responseData = ([ "message"=>"failure"]);
            return response($responseData, 300);
        }
      
    }
    // function to save User Favourite Artist  to database

    public function saveFavouriteArtist(Request $request){
        try {
            
            $fav_artist = favouriteartist::create([
                'username'=>$request->username,
                'artist'=>$request->artist
            ]);
            $responseData = (["message"=>"success"]);
            return response($responseData,200);        
        }
            
            catch (\Throwable $th) {
          $responseData = (["message"=>"error"]);
          return response($responseData,300);
        }
        

    }
}
