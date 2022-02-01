@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <label for="title">Title</label>
            <input type="text" id="title" name="title"
            value="{{old('title', $post->title)}}" class="form-control mb-3">
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror

            <label for="content">Content</label>
            <input type="text" id="content" name="content" 
            value="{{old('content', $post->content)}}"class="form-control mb-3">
            @error('content')
                <div class="text-danger">{{$message}}</div>
            @enderror

            <button type="submit">Post</button>


        </form>
    </div>
@endsection