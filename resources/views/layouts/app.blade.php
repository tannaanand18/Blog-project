<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
=======
>>>>>>> 050206aac0484a8d0eca02d3d991632220975c81
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    @include('layouts.navigation')

    <div class="min-h-screen">
        @yield('content')
    </div>

</body>
</html>
