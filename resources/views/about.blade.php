@extends('layouts.main')
@section('container')
    <h1>Halaman About</h1>
    <h3>{{ $nama }}</h3>
    <p><?= $email?></p>
    <img src="img/<?= $image?>" alt="yusufbagus" width="200px" class="img-tumbnail rounded-circle">
@endsection
