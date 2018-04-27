@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8" style="width: 60%; float: left;">
                <div class="row">
                    <h3 style="text-align: center">{{ $post->title }}</h3>
                </div>
                <div class="row">
                    <h2 style="text-align: center"><a href="{{ route('posts.author', ['id' => $post->user->id]) }}">Author: {{ $post->user->name }}</a></h2>
                </div>

                <div class="row">
                    <h4 style="text-align: center">Posted: {{ $post->date }}</h4>
                </div>

                <div class="row">
                    <p style="text-align: center">{{ $post->text }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection