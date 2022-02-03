@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$post->title}}</h2>
        <h5>@if ($post->category) {{$post->category->name}} @else Uncategorized
            
        @endif</h5>
        <p>
            {{$post->content}}
        </p>
    </div>
@endsection