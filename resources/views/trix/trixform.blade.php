@extends('layouts.admin')
@section('content')
    {{-- <form method="POST" action="{{ route('posts.store') }}"> --}}
    @csrf
    @trix(\App\Post::class, 'content')
    <input type="submit">
    {{-- </form> --}}
@endsection
