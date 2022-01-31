@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-4">
                    <div class="card mb-3 text-center p-2">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->content}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection