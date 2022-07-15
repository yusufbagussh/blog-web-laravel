<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        //dd(request('search'));
        // $posts = Post::latest();

        // if (request('search')) {
        //     $posts->where('tittle', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }


        $tittle = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $tittle = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $tittle = ' by ' . $author->name;
        }

        return view('posts', [
            "tittle" => "All Post" . $tittle,
            "active" => "posts",
            // "posts" =>  Post::all()
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
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
            "active" => "posts",
            "post" => $post
        ]);
    }
}
