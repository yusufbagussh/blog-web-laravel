@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">

            <h1 class="mb-3">{{ $post['tittle'] }}</h1>

            <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

            @if ($post->image)
        <div>
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" style="width: 1350px; height:400px" alt="{{ $post->category->name }}">
        </div>
        @else
        <img src="https://source.unsplash.com/500x350?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
        @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

            <a href="/blog" class="d-block mt-3">Back to posts</a>

        </div>
    </div>
</div>

@endsection
