@extends('layouts.main')
@section('container')
    <h1 class="mb-3 text-center">{{ $tittle }}</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                      </div>
                </form>
            </div>
        </div>

    @if($posts->count())

    <div class="card mb-3">

        @if ($posts[0]->image)
        <div>
            <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid" style="width: 1350px; height:400px" alt="{{ $posts[0]->category->name }}">
        </div>
        @else
        <img src="https://source.unsplash.com/500x350?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif
        <div class="card-body text-center">
        <h4 class="card-title"><a href="posts/{{ $posts[0]['slug'] }}" class="text-decoration-none text-dark">{{ $posts[0]->tittle }}</a></h4>
        <p>
            <small class="text-muted">
                By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
            </small>  
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>

        <a href="posts/{{ $posts[0]['slug'] }}" class="text-decoration-none btn btn-primary">Read More</a>
        </div>
    </div>


    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="position-absolute bg-dark px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                    
                    @if ($post->image)
                    <div>
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                    </div>
                    @else
                    <img src="https://source.unsplash.com/500x350?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    @endif
                    
                    <div class="card-body">
                      <h5 class="card-title"><a href="posts/{{ $post['slug'] }}" class="text-decoration-none text-dark">{{ $post->tittle }}</a></h5>
                      <p>
                        <small class="text-muted">
                            By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }}
                        </small>  
                    </p>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="posts/{{ $post['slug'] }}" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
        
    @else
    <p class="text-center fs-4">No Post Found</p>
    @endif

    <div class="d-flex justify-content-center">
        {{$posts->links()  }}
    </div>

@endsection