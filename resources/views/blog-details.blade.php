@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    .blog-hero-img {
        width: 100%;
        max-height: 500px;
        height: auto;
        border-radius: 18px;
        object-fit: contain;
        background-color: #f1f1f1;
        padding: 10px;
    }
    .blog-title {
        font-size: 36px;
        font-weight: 800;
        color: #222;
    }
    .blog-meta {
        font-size: 15px;
        color: #777;
    }
    .blog-desc {
        font-size: 19px;
        line-height: 1.9;
        margin-top: 20px;
    }
    .share-btn a {
        margin-right: 8px;
        font-size: 20px;
        text-decoration: none;
    }
    .comment-box {
        border-radius: 10px;
    }
</style>

<div class="container py-5">

    <h1 class="blog-title text-center">{{ ucfirst($blog->title) }}</h1>
    <p class="text-center blog-meta">
        <span>{{ $blog->created_at->format('d M, Y') }}</span> • 
        <span class="badge bg-primary">{{ $blog->category->name }}</span>
    </p>

    @if($blog->image)
        <img src="{{ asset('uploads/' . $blog->image) }}" class="blog-hero-img my-4">
    @endif

    <p class="blog-desc text-justify">{!! nl2br(e($blog->description)) !!}</p>

    <div class="d-flex justify-content-between align-items-center mt-4">
        @auth
        <button id="likeBtn" class="btn btn-outline-primary">
            👍 Like (<span id="likeCount">{{ $blog->likes->count() }}</span>)
        </button>
        @else
        <span class="text-primary"><i class="fa-solid fa-thumbs-up"></i> {{ $blog->likes->count() }}</span>
        @endauth

        <div class="share-btn">
            <span>Share: </span>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank">
                <i class="fa-brands fa-facebook text-primary"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}" target="_blank">
                <i class="fa-brands fa-twitter text-info"></i>
            </a>
            <a href="https://wa.me/?text={{ urlencode(Request::url()) }}" target="_blank">
                <i class="fa-brands fa-whatsapp text-success"></i>
            </a>
        </div>
    </div>

    <hr class="my-4">
    <h4 class="mb-3">💬 Comments ({{ $blog->comments->count() }})</h4>

    @auth
    <form action="{{ route('blog.comment', $blog->id) }}" method="POST" class="mb-4">
        @csrf
        <textarea name="comment" class="form-control comment-box" rows="3"
                  placeholder="Write your comment..." required></textarea>
        <button class="btn btn-success mt-2">Post Comment</button>
    </form>
    @endauth

    @foreach ($blog->comments as $comment)
        <div class="p-3 border rounded mb-2 shadow-sm bg-white">
            <strong>{{ $comment->user->name }}</strong>
            <p class="m-0">{{ $comment->comment }}</p>
            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
    @endforeach

    <div class="text-center mt-4">
        <a href="{{ route('blogs.index') }}" class="btn btn-dark">⟵ Back to Blogs</a>
    </div>

</div>

@auth
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#likeBtn').on('click', function () {
        $.ajax({
            url: "{{ route('blog.like', $blog->id) }}",
            method: "POST",
            data: {_token: "{{ csrf_token() }}"},
            success: function (response) {
                $('#likeCount').text(response.likes_count);
            }
        });
    });
</script>
@endauth

@endsection
