@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
        </div>
    </div>
    <div class="row">
        @foreach($posts as $post)
            <div class="col">
                <div class="card" style="margin: 5px; width: 18rem;">
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <h5>Posted: {{ $post->date }} / Author: {{ $post->user->name }}</h5>
                        <p class="card-text">{{ str_limit($post->text,400) }}</p>
                        <footer><a href="{{ route('post.show',$post->id) }}"> More &raquo;</a></footer>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        {{ $posts->links() }}
    </div>
</div>
@endsection
