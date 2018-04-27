@extends('layouts.app');

@section('content')
    <form action="{{ route('post.update', ['id' => $id]) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label >Title</label>
            <input value="{{ $post->title }}" type="text" class="form-control" name="title" aria-describedby="type tilte" placeholder="Title">
        </div>
        <div class="form-group">
            <label >Text</label>
            <textarea name="text" type="text" class="form-control">{{ $post->text }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('post.all') }}">Back to posts list</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection