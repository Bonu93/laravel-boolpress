@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-5">Create new Post</a>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-4">
                    <div class="card mb-3 text-center p-2">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->content}}</p>

                        <div class="cta">
                            <a href="{{route('admin.posts.show', $post->Slug)}}" class="btn btn-primary">Show</a>

                            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-success">Edit</a>


                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection