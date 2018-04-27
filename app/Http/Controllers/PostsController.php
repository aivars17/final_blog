<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts()->paginate(10);
        return view('posts.all', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostStoreRequest $request)
    {
        $user = Auth::user();
        $user->posts()->create($request->except('_token') + [
            'date' => Carbon::now(),
            ]);
        Session::flash('message', 'Your story was posted');
        return redirect()->route('home');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        Session::flash('message', 'Post was deleted');
        return redirect()->back();
    }

    public function update($id, PostUpdateRequest $request)
    {
        Post::findOrFail($id)->update($request->except('_token'));
        Session::flash('message', 'Your post updated');
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact(['post', 'id']));
    }

    public function postsAuthor($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->paginate(5);

        return view('posts.authorPosts', compact('posts'));
    }
}
