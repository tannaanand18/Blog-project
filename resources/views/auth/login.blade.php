<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login - Story Blog</title>

    {{-- Breeze assets (JS etc.) --}}
    @vite(['resources/js/app.js'])

    {{-- Story template CSS --}}
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd 0%, #6610f2 50%, #f97316 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Montserrat", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        .auth-card {
            max-width: 960px;
            width: 100%;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            background: #ffffff;
        }
        .auth-left {
            background: url('{{ asset('assets/img/blog/blog-hero-3.webp') }}') center/cover no-repeat;
            position: relative;
        }
        .auth-left::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(13, 110, 253, 0.2), rgba(0, 0, 0, 0.6));
        }
        .auth-left-content {
            position: relative;
            z-index: 2;
            color: #fff;
        }
        .auth-left h2 {
            font-weight: 700;
        }
        .brand-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(10px);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .auth-right {
            padding: 40px 40px 32px;
        }
        .auth-right h3 {
            font-weight: 700;
            margin-bottom: 0.25rem;
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
        .small-link {
            font-size: 0.85rem;
        }
        .error-text {
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
<div class="container px-3 px-sm-0">
    <div class="auth-card row g-0">
        {{-- Left side (image + text) --}}
        <div class="col-md-6 d-none d-md-flex auth-left align-items-end">
            <div class="auth-left-content p-4 p-lg-5">
                <span class="brand-pill mb-3">
                    <i class="bi bi-journal-richtext"></i>
                    Story Blog
                </span>
                <h2 class="mb-2">Welcome back 👋</h2>
                <p class="mb-4">
                    Log in to share your latest stories, explore fresh ideas, and manage your blogs in one beautiful dashboard.
                </p>
                <p class="mb-0 small opacity-75">
                    “Every story matters. Yours too.”
                </p>
            </div>
        </div>

        {{-- Right side (form) --}}
        <div class="col-md-6 auth-right bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center gap-2">
                    <span class="fw-bold fs-5 text-primary">Story</span>
                </a>
                <a href="{{ route('register') }}" class="small-link text-muted">
                    New here? <span class="fw-semibold text-primary">Create account</span>
                </a>
            </div>

            <h3>Sign in</h3>
            <p class="text-muted mb-4">Use your email and password to continue.</p>

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

            {{-- Success flash (e.g. after register / logout) --}}
            @if (session('status'))
                <div class="alert alert-success py-2 error-text mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="mt-2">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label small fw-semibold">Email address</label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
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
                           placeholder="••••••••">
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="remember_me" name="remember">
                        <label class="form-check-label small" for="remember_me">
                            Remember me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="small-link text-primary text-decoration-none" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Log in
                    </button>
                </div>

                <p class="small text-muted mb-0">
                    By continuing, you agree to our <a href="#" class="text-decoration-none">Terms</a> and
                    <a href="#" class="text-decoration-none">Privacy Policy</a>.
                </p>
            </form>
        </div>
    </div>
</div>

{{-- JS --}}
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
