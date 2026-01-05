<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();

            // Check if user exists by github_id
            $user = User::where('github_id', $githubUser->id)->first();

            if ($user) {
                // If user exists, login
                Auth::login($user);
                return redirect('/user/home');
            } else {
                // Check if email exists
                $existUser = User::where('email', $githubUser->email)->first();
                if ($existUser) {
                    // Update github_id
                    $existUser->update([
                        'github_id' => $githubUser->id,
                        'auth_type' => 'github'
                    ]);
                    Auth::login($existUser);
                    return redirect('/user/home');
                } else {
                    // Create new user
                    $newUser = User::create([
                        'name' => $githubUser->name ?? $githubUser->nickname,
                        'email' => $githubUser->email,
                        'github_id' => $githubUser->id,
                        'auth_type' => 'github',
                        'password' => Hash::make(Str::random(16)), // Dummy password
                        'role_id' => 2 // Default to User/Siswa role
                    ]);

                    Auth::login($newUser);
                    return redirect('/user/home');
                }
            }
        } catch (\Exception $e) {
            return redirect('/user/login')->with('error', 'Login with GitHub failed: ' . $e->getMessage());
        }
    }
}
