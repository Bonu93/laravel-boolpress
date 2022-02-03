@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$category->name}}</h2>

        @foreach ($category->posts as $post)
            <article class="mb-3">
                <h3>{{$post->title}}</h3>
                <a href="{{route('admin.posts.show', $post->Slug)}}" class="btn btn-primary">Show</a>
                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
            </article>
            
        @endforeach
    </div>
@endsection