@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-8">

            <h1 class="mb-3">{{ $post['tittle'] }}</h1>

            <a href="/dashboard/posts" class="btn btn-info"><span data-feather="arrow-left"></span>Back to all my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure???')"><span data-feather="x-circle"></span>Delete</button>
              </form>
            
              @if ($post->image)
              <div class="" style="max-height: 400px; overflow:hidden">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3" alt="{{ $post->category->name }}">
              </div>
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3" alt="{{ $post->category->name }}">
              @endif         

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

        <a href="/blog" class="d-block mt-3">Back to posts</a>

        </div>
    </div>
</div>
@endsection
