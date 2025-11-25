@extends('layouts.app')

@section('content')

<section class="blog-details section pt-5">
  <div class="container" data-aos="fade-up">

    <div class="text-center mb-4">
      <h1>{{ $blog->title }}</h1>
      <p class="text-muted">{{ $blog->created_at->format('d M, Y') }}</p>
    </div>

    <img src="{{ asset('uploads/'.$blog->image) }}" class="img-fluid rounded mb-4" alt="Blog Image">

    <p style="font-size:18px; line-height:1.8;">
      {!! nl2br(e($blog->description)) !!}
    </p>

    <a href="{{ route('blogs.index') }}" class="btn btn-primary mt-4">← Back to Blogs</a>
  </div>
</section>

@endsection
