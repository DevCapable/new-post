<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\postRequest;
use App\Http\Requests\registrationRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getPostIndex()
    {
        $post = Post::all();
        return view('post.index')->with('posts', $post);
    }

    public function getRegister()
    {
        return view('post.register');
    }

    public function register(registrationRequest $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'email|required|unique:users',
            'vat_number' => 'max:13',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $request['password'] = bcrypt($request->password);
        $creat_user = User::create($request->all());

        return redirect()->to('/post/login')->with('success', 'You have successfully registered');
    }

    public function getLogin()
    {
        return view('post.login');
    }

    public function login(loginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        $userId = Auth::id();
        $post = Post::all();
        if (Auth::attempt($credentials)) {
            return view('post.index')->with(['success' => 'Your session starts now!',
                'posts' => $post,
                'user_id' => $userId
            ]);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function create()
    {
        return view('post.create');
    }

    public function getCreate(postRequest $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'user_id' => 'required'
        ]);
        $create_opost = Post::create($request->all());
        return redirect()->to('/user')->with('success', 'Post created successfully!');
    }

//    public function destroy(Post $post)
//    {
//        if (Auth()->user()->can('delete',$post)){
//            $post->delete();
//            return redirect()->to('/user')->with('success', 'Post deleted successfully!');
//        }
//        return redirect()->back()->with('warning', 'can not delete!');
//
//
//
//    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->to('/user')->with('success', 'Post deleted successfully!');
//        return redirect()->back()->with('warning', 'can not delete!');


    }
}
