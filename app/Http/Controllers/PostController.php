<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "tittle" => "All Post",
            "active" => "blog",
            // "posts" =>  Post::all()
            //Menampilkan seluruh post atau blog dari post terakhir atau terbaru
            "posts" =>  Post::latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        // $new_post = [];
        // foreach ($blog_posts as $post) {
        //     if ($post["slug"] === $slug) {
        //         $new_post = $post;
        //     }
        // }

        return view('post', [
            "tittle" => "Single Post",
            "active" => "blog",
            "post" => $post
        ]);
    }
}
