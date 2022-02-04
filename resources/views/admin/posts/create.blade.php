@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">

            {{-- Post data --}}

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



            {{-- Categories --}}

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

            {{-- Tags --}}

            <div class="tags mb-3">
                @foreach ($tags as $tag)
                    <label for="tag{{ $loop->iteration }}">
                        {{ $tag->name }}
                    </label>

                    <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}"
                    @if (in_array($tag->id, old('tags', []))) checked @endif
                    >
                    
                @endforeach
                
                @error('tags')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Post</button>


        </form>
    </div>
@endsection