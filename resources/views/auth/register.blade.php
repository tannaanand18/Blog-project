<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Register - Story Blog</title>

    @vite(['resources/js/app.js'])

    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at top left, #f97316 0%, #6610f2 30%, #0d6efd 80%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Montserrat", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        .auth-card {
            max-width: 980px;
            width: 100%;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            background: #ffffff;
        }
        .auth-left {
            background: url('{{ asset('assets/img/blog/blog-hero-1.webp') }}') center/cover no-repeat;
            position: relative;
        }
        .auth-left::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(15,23,42,0.1), rgba(15,23,42,0.85));
        }
        .auth-left-content {
            position: relative;
            z-index: 2;
            color: #fff;
        }
        .auth-right {
            padding: 40px 40px 32px;
        }
        .form-control {
            border-radius: 999px;
            padding: 0.65rem 1.1rem;
        }
        .btn-primary {
            border-radius: 999px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
        }
        .badge-soft {
            background: rgba(255,255,255,0.15);
            border-radius: 999px;
            padding: 5px 12px;
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .error-text {
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
<div class="container px-3 px-sm-0">
    <div class="auth-card row g-0">
        {{-- Left side --}}
        <div class="col-md-6 d-none d-md-flex auth-left align-items-end">
            <div class="auth-left-content p-4 p-lg-5">
                <span class="badge-soft mb-3">
                    <i class="bi bi-pen"></i> Start your blogging journey
                </span>
                <h2 class="fw-bold mb-2">Create your Story account</h2>
                <p class="mb-4">
                    Publish blogs, share your cricket thoughts, coding notes, and track your writing progress
                    in one place.
                </p>
                <ul class="small opacity-85 mb-0">
                    <li>Write and manage posts easily</li>
                    <li>Secure login with Laravel Breeze</li>
                    <li>Clean UI integrated with your blog website</li>
                </ul>
            </div>
        </div>

        {{-- Right side (form) --}}
        <div class="col-md-6 auth-right bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center gap-2">
                    <span class="fw-bold fs-5 text-primary">Story</span>
                </a>
                <a href="{{ route('login') }}" class="small text-muted text-decoration-none">
                    Already a member? <span class="fw-semibold text-primary">Login</span>
                </a>
            </div>

            <h3>Create account</h3>
            <p class="text-muted mb-4">Just a few details to get you started.</p>

            {{-- Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    <ul class="mb-0 error-text">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="mt-2">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label small fw-semibold">Full name</label>
                    <input id="name"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Tanna Anand">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label small fw-semibold">Email address</label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="you@example.com">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label small fw-semibold">Password</label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Choose a strong password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label small fw-semibold">Confirm password</label>
                    <input id="password_confirmation"
                           type="password"
                           name="password_confirmation"
                           required
                           class="form-control"
                           placeholder="Repeat password">
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="terms" required>
                    <label class="form-check-label small" for="terms">
                        I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a>.
                    </label>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-person-plus me-1"></i> Sign up
                    </button>
                </div>

                <p class="small text-muted mb-0">
                    You can update your profile details anytime from the dashboard.
                </p>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
