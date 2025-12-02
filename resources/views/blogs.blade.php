<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
=======
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81

    <style>
        body {
            background: #f5f7fa;
        }
        .blog-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            transition: 0.3s ease;
        }
        .blog-card:hover {
            transform: translateY(-8px);
        }
        .blog-img {
            height: 230px;
            object-fit: cover;
            width: 100%;
        }
        .blog-title {
            font-size: 20px;
            font-weight: 600;
        }
        .blog-desc {
            font-size: 14px;
            color: #666;
        }
        .btn-read {
            border-radius: 10px;
        }
        .heading {
            font-weight: 700;
            color: #222;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="heading mb-4">📝 Latest Blogs</h2>

    <div class="row">
<<<<<<< HEAD
        
        <!-- Sidebar -->
        <div class="col-md-3">
            <h5>Categories</h5>
            <ul class="list-group">
                <a href="/blogs?category=all" class="list-group-item">All Blogs</a>

                @foreach($categories as $cat)
                    <a href="/blogs?category={{ $cat->id }}" class="list-group-item">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </ul>
        </div>

        <!-- Blogs List -->
        <div class="col-md-9">
            <h3>Blogs</h3>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-6 mb-4">
                        <div class="card blog-card">

                            @if($blog->image)
                                <img src="/uploads/{{ $blog->image }}" class="blog-img">
                            @endif

                            <div class="card-body">
                                <h5 class="blog-title">{{ $blog->title }}</h5>
                                <p class="blog-desc">{{ Str::limit($blog->description, 100) }}</p>

                                <span class="badge bg-primary">{{ $blog->category->name }}</span>

                                <!-- Like, Comment Count & Share -->
                                <div class="d-flex gap-4 mt-3">

                                    <span class="text-primary">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                        {{ $blog->likes->count() }}
                                    </span>

                                    <span class="text-success">
                                        <i class="fa-solid fa-comment"></i>
                                        {{ $blog->comments->count() }}
                                    </span>

                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blogs.show', $blog->id)) }}"
                                       target="_blank" class="text-danger">
                                        <i class="fa-solid fa-share"></i>
                                    </a>

                                </div>

                                <a href="/blog/{{ $blog->id }}" class="btn btn-sm btn-dark mt-3 w-100">
                                    Read More
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

=======
    <!-- Sidebar -->
    <div class="col-md-3">
        <h5>Categories</h5>
        <ul class="list-group">
            <a href="/blogs?category=all" class="list-group-item">All Blogs</a>

            @foreach($categories as $cat)
                <a href="/blogs?category={{ $cat->id }}" class="list-group-item">
                    {{ $cat->name }}
                </a>
            @endforeach
        </ul>
    </div>

    <!-- Blogs List -->
    <div class="col-md-9">
        <h3>Blogs</h3>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        @if($blog->image)
                            <img src="/uploads/{{ $blog->image }}" class="card-img-top" height="200">
                        @endif
                        <div class="card-body">
                            <h5>{{ $blog->title }}</h5>
                            <p>{{ Str::limit($blog->description, 100) }}</p>
                            <span class="badge bg-primary">{{ $blog->category->name }}</span>
                            <a href="/blog/{{ $blog->id }}" class="btn btn-sm btn-dark mt-2">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
</div>

</body>
</html>
