@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->title }} / Posted: {{ $post->date }}</h3>
                        <h4>Author: {{ $post->user->name }}</h4>
                        <p class="card-text">{{ str_limit($post->text,400) }}</p>
                        <footer><a href="{{ route('post.show',$post->id) }}"> More &raquo;</a></footer>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
