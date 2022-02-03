@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control mb-3">
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
            <label for="content">Content</label>
            <input type="text" id="content" name="content" class="form-control mb-3">
            @error('content')
                <div class="text-danger">{{$message}}</div>
            @enderror

            <label for="category_id">Category</label>


            <select class="form-control mb-3" name="category_id" id="category_id">

                <option value="">No category</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if ($category->id == old('category_id')) selected @endif
                        >
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{$message}}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Post</button>


        </form>
    </div>
@endsection