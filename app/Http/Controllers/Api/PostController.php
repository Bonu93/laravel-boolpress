<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = Post::paginate(6);
        return  response()->json($posts);
    }

    public function show($slug) {
        $post = Post::where('Slug', $slug)->with(['category', 'tags'])->first();

        return response()->json($post);
    }

}