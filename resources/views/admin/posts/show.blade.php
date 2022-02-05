@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$post->title}}</h2>
        <h5>@if ($post->category) {{$post->category->name}} @else Uncategorized
            
        @endif</h5>

        <div class="tags">
            @if (!$post->tags->isEmpty())
                @foreach ($post->tags as $tag)
                    <span class="badge badge-success">
                        {{$tag->name}}
                    </span>
                @endforeach
            @else
                <span class="badge badge-danger">No tags for this post</span>
            @endif
        </div>
        <p>
            {{$post->content}}
        </p>
    </div>
@endsection