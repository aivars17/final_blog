@extends('layouts.app');

@section('content')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label >Title</label>
            <input type="text" required class="form-control" name="title" aria-describedby="type tilte" placeholder="Title">
        </div>
        <div class="form-group">
            <label >Text</label>
            <input type="text" required name="text" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
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