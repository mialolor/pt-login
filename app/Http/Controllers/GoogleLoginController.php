<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('dashboard', ['user' => $user]);
    }

    /**
     * Function: googleLogin
     * Description: This function will redirect to Google
     * @param NA
     * @return void
     */
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Function: googleAuthentication
     * Description: This function will authenticate the user through the Google Account
     * @param NA
     * @return void
     */
    public function googleAuthentication()
    {
        try {
            $googleUser  = Socialite::driver('google')->user();
            

            $user = User::where('google_id', $googleUser ->id)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('dashboard');
            } else {
                // Create a new user and store the profile picture URL
                $userData = User::create([
                    'name' => $googleUser ->name,
                    'email' => $googleUser ->email,
                    'password' => Hash::make('Password@1234'), // can be change
                    'google_id' => $googleUser ->id,
                    'profile_picture' => $googleUser ->avatar, 
                ]);

                if ($userData) {
                    Auth::login($userData);
                    return redirect()->route('dashboard');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}