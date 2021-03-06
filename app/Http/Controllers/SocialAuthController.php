<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use Exception;

class SocialAuthController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();
        // return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        try {
            
        
            $googleUser = Socialite::driver('google')->stateless()->user();
            // $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();
            

            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/');
            // return redirect()->back();
        } 
        catch (Exception $e) {
            // return 'error';
            return $e;
        }
    }


}
