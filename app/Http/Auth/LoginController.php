<?php

namespace App\Http\Auth;

use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController
{
    public function github()
    {
        return Socialite::driver('github')->redirect();

    }

    public function githubRedirect()
    {

        try {
            $user = Socialite::driver('github')->stateless()->user();
//            $check_user = User::where('email',$user->email)->first();
//            if (!$check_user) {
//            dd($user);
                $user = User::firstOrCreate(
//                    'id' => $user->id,
                   [ 'email' => $user->email],
                    ['name' => $user->name  ],
//                    'remember_token' => $user->token,
                    ['password' => Hash::make('password')]
                );
//            }
            $userId = Auth::id();
            $post = Post::all();
            Auth::login($user,true);
            return view('post.index')->with([
                'success' => 'Your session starts now!',
                'posts' => $post,
                'user_id' => $userId
            ]);
        } catch (\Exception $e) {
            throw $e;
        }


    }




    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();

    }

    public function facebookRedirect()
    {

        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            $userId = Auth::id();
            $post = Post::all();
            $isUser = User::where('email', $user->email)->first();
            if($isUser){
                Auth::login($isUser);
                return view('post.index')->with([
                    'success' => 'Your session starts now!',
                    'posts' => $post,
                    'user_id' => $userId
                ]);
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return view('post.index')->with([
                    'success' => 'Your session starts now!',
                    'posts' => $post,
                    'user_id' => $userId
                ]);
            }
            $userId = Auth::id();
            $post = Post::all();
            Auth::login($user,true);
            return view('post.index')->with([
                'success' => 'Your session starts now!',
                'posts' => $post,
                'user_id' => $userId
            ]);
        } catch (\Exception $e) {
            throw $e;
        }


    }



    public function google()
    {
        return Socialite::driver('google')->redirect();

    }

    public function googleRedirect()
    {

        try {
            $user = Socialite::driver('google')->stateless()->user();
            $userId = Auth::id();
            $post = Post::all();
            $isUser = User::where('email', $user->email)->first();
            if($isUser){
                Auth::login($isUser);
                return view('post.index')->with([
                    'success' => 'Your session starts now!',
                    'posts' => $post,
                    'user_id' => $userId
                ]);
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return view('post.index')->with([
                    'success' => 'Your session starts now!',
                    'posts' => $post,
                    'user_id' => $userId
                ]);
            }
            $userId = Auth::id();
            $post = Post::all();
            Auth::login($user,true);
            return view('post.index')->with([
                'success' => 'Your session starts now!',
                'posts' => $post,
                'user_id' => $userId
            ]);
        } catch (\Exception $e) {
            throw $e;
        }


    }

}
