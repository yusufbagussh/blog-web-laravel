@extends('layouts.main')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

        <main class="form-signin">
            <form method="post" action="/login">
              @csrf
              <h1 class="h3 mb-3 fw-norma text-center">Please sign in</h1>
          
              <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="passoword" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
              <small class="d-block text-center mt-3"> Not Registered? <a href="/register">Register Now!</a></small>
              
            </form>
          </main>
    </div>
</div>

@endsection
