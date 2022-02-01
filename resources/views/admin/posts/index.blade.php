@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-4">
                    <div class="card mb-3 text-center p-2">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->content}}</p>

                        <div class="cta">
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