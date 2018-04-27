<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(UserRegisterRequest $request)
    {
        User::create($request->except('_token', 'password') + [
            'password' => bcrypt($request->password),
            ]);
        return redirect()->route('home');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('auth.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request)
    {
        $user = Auth::user();
        $user->update($request->only('name', 'email') + [
            'password' => bcrypt($request->password),
            ]);

        return redirect()->back();
    }

    public function show()
    {
        $users = User::all();
        return view('users.show', compact('users'));
    }

    public function destroy()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();
        foreach ($posts as $post){
            $post->delete();
        }
        $user->delete();
        return redirect()->route('home');
    }
}
