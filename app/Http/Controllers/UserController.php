<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        Session::flash('message', 'New account was created');
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
        Session::flash('message', 'Your account was updated');
        return redirect()->back();
    }

    public function show()
    {
        $users = User::paginate(10);
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
        Session::flash('message', 'Your account was deleted');

        return redirect()->route('home');
    }
}
