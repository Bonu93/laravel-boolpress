<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();


        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation_rules(), $this->validation_messages());

        $data = $request->all();

        //POST IMAGE
        if(array_key_exists('image', $data)) {
            $img_path = Storage::put('posts-images', $data['image']);
            $data['image'] = $img_path;
        }

        $new_post = new Post();

        $slug = Str::slug($data['title'], '-');
        $count = 1;
        $base_slug = $slug;

        while(Post::where('slug', $slug)->first()) {
            $slug = $base_slug . '-' . $count;
        }

        $data['slug'] = $slug;

        

        $new_post->fill($data);

        $new_post->save();

        if(array_key_exists('tags', $data)) {
            $new_post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.show', $new_post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (! $post) {
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (! $post)  {
            abort(404);
        }

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validation_rules(), $this->validation_messages());

        $data = $request->all();

        if(array_key_exists('image', $data)) {
            if ($post->image) {
                Storage::delete($post->image);
            } 

            $data['image'] = Storage::put('posts-images', $data['image']);
        }
       
      
        if ($data['title'] != $post->title) {
            $slug = Str::slug($data['title'], '-');
            $count = 1;
            $base_slug = $slug;

            // run th cicle if found the post with same slug
            while (Post::where('slug', $slug)->first()) {
                // gen new slug with counter
                $slug .= $base_slug . '-' . $count;
                $count++;
            }
            $data['slug'] = $slug;
        }
        else {
            $data['slug'] = $post->Slug;
        }



        if(array_key_exists('tags', $data)) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }

        $post->update($data);

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();

        $post->tags()->detach();

        return redirect()->route('admin.posts.index');
    }






    private function validation_rules() {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'image' => 'nullable|file|mimes:jpeg,jpg,bmp,png'
        ];
    }

    private function validation_messages() {
        return [
            'required' => 'The :attribute is required',
            'max' => 'Max :max characters allowed for the :attribute',
            'category_id.exists' => 'Selected category does not exists',
            'tags.exists' => 'Seleceted tag does not exists'
        ];
    }


}


