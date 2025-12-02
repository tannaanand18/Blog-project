<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }
        .form-control, .form-control:focus {
            border-radius: 10px;
            box-shadow: none;
        }
        .btn-primary {
            border-radius: 10px;
            padding: 10px;
            font-size: 17px;
        }
        .header-title {
            font-weight: 700;
            color: #222;
        }
    </style>
</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            
            <div class="card p-4">
                <h2 class="header-title mb-4 text-center">✏️ Publish a New Blog</h2>

                <form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Blog Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="Enter blog title">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Blog Description</label>
                        <textarea name="description" rows="4" class="form-control" required placeholder="Write your blog description..."></textarea>
                    </div>

                    <select name="category_id" class="form-control" required>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select>



                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary w-100">Publish Blog</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
