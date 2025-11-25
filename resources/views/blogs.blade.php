<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <div class="row g-4">

        @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="blog-card">

                    <img src="{{ asset('uploads/'.$blog->image) }}" class="blog-img">

                    <div class="p-3">
                        <h4 class="blog-title">{{ $blog->title }}</h4>
                        <p class="blog-desc">{{ Str::limit($blog->description, 120) }}</p>

                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-read mt-2">
                            Read More →
                        </a>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

</div>

</body>
</html>
