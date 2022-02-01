@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control mb-3">

            <label for="content">Content</label>
            <input type="text" id="content" name="content" class="form-control mb-3">

            <button type="submit">Post</button>


        </form>
    </div>
@endsection