<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Menampilkan halaman home
Route::get('/', function () {
    return view('home', [
        "tittle" => "Home",
        "active" => "home",
    ]);
});

//Menampilkan halaman about
Route::get('/about', function () {
    return view('about', [
        'tittle' => 'About',
        "active" => "about",
        'nama' => 'Yusuf Bagus S. H.',
        'email' => 'yusuf.herlambang27@gmail.com',
        'image' => 'foto2.png'
    ]);
});

//Menampilkan halaman seluruh blog atau post
Route::get('/blog', [PostController::class, 'index']);

//Menampilkan detail dari blog atau post berdasarkan slug yang dikirimkan
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

//Menampilkan halaman list kategori
Route::get('/categories', function () {
    return view('categories', [
        'tittle' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

//Menampilkan list post berdasarkan slug kategori yang dikirimkan
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'active' => 'categories',
        'tittle' => "Post By Category : $category->name",
        'posts' => $category->posts->load('category', 'author'),
    ]);
});

//Menampilkan detail post berdasarkan slug post yang dikirimkan pada halaman berdasarkan nama category tertentu
Route::get('/categories/posts/{post:slug}', [PostController::class, 'show']);

//Menampilkan list post berdasarkan username author yang dikirimkan
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'tittle' => "Post By Author : $author->name",
        'active' => 'blog',
        'posts' => $author->posts->load('category', 'author'),
    ]);
});

//Menampilkan detail post berdasarkan slug post yang dikirimkan pada halaman berdasarkan username author tertentu
Route::get('/authors/posts/{post:slug}', [PostController::class, 'show']);
