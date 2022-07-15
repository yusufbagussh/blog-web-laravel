<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Post
{
    private static $blog_posts = [
        [
            "tittle" => "Blog Pertama",
            "author" => "Yusuf Bagus",
            "slug" => "blog-pertama",
            "content" =>  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo exercitationem minima quas officiis libero ab id earum ipsam, sit accusantium rerum culpa quae nulla et? Error labore illo eveniet molestias?"
        ],
        [
            "tittle" => "Blog Kedua",
            "author" => "Dhimas Risang",
            "slug" => "blog-kedua",
            "content" =>  "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo exercitationem minima quas officiis libero ab id earum ipsam, sit accusantium rerum culpa quae nulla et? Error labore illo eveniet molestias?"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = self::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
