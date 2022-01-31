<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 0; $i < 5; $i++) {
            $post = new Post();
    
            $post->title = 'Post Title ' . ($i + 1);
            $post->slug = Str::slug($post->title, '-');
            $post->content = 'Lorem ipsum dolor sit amet' . ($i + 1);
    
            $post->save();

        }

    }
}
