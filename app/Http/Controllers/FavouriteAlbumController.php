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

        try{
        $myFaves = favouritealbum::where('username', $request->username)->get();

        $count =0;

        foreach($myFaves as $fave){
         if($fave->album ==$request->album){
            $count+=1;
         }
        }
        
        if($count==0){
        $fav_album = favouritealbum::create([
            'username'=>$request->username,
            'artist'=>$request->artist,
            'album'=>$request->album,
        ]);
        $responseData = (["message"=>"success"]);

        return response($responseData,200);
    }

    else{
       
            $responseData = (["message"=>"duplicate"]);
    
            return response($responseData,200);
        }
    }
       catch (\Throwable $th) {

        $responseData = (["message"=>"failure"]);

        return response($responseData,300);
      }


    }


    public function deleteFavouriteAlbum(Request $request){
        try {
            $album = favouritealbum::where(['username'=> $request->username, 
        'album'=>$request->album,'artist'=>$request->artist])->get()[0];
        $album->delete();
        $responseData = (["message"=>"success"]);
        return response($responseData,200);

        } catch (\Throwable $th) {
            $responseData = (["message"=>"failure"]);
            return response($responseData,300);

        }
     
    }
}
