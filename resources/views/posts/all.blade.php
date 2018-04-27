@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-warning" href="{{ route('post.create') }}">Create new post</a>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->text }}</td>
                        <td><a class="btn btn-primary" href="{{ route('post.edit', ['id' => $post->id]) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <a class="btn btn-warning" href="{{ route('post.create') }}">Create new post</a>
        </div>
    </div>
@endsection