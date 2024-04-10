<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GoogleAuthController extends Controller
{

    //function to redirect User to Google Authentication Page
    public function redirect(Request $request){

        return Socialite::driver('google')->redirect();
    }
       

    //function to save Google Authenticated User in db and direct them to home Page
    public function callbackGoogle(Request $request){
      
            $google_user = Socialite::driver('google')->stateless()->user();
            $user = User::where('email',$google_user->getEmail())->first();

            if($user){
               
                $username = $google_user->getEmail();
                return Redirect::to("http://localhost:3000/home?username=$username");

            }

            else{
                $new_user = User::create([
                    'name'=>$google_user->getName(),
                    'email'=>$google_user->getEmail(),
                ]);

               session(['username', $google_user->getEmail()]);
              $username = $google_user->getEmail();

                return Redirect::to("http://localhost:3000/home?username=$username");

            }
      
    }

   
}
