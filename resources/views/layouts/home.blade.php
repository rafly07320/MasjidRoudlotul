<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    
    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-w-full min-h-screen">
        <x-navbar />
        @yield('content')
        <x-footer />
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (Session::has('success'))
                Toastify({
                    text: "{{ Session::get('success') }}",
                    duration: 2000,
                    destination: "https://github.com/apvarun/toastify-js",
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "green",
                    },
                    onClick: function() {} // Callback after click
                }).showToast();
            @endif

            @if (Session::has('error'))
                Toastify({
                    text: "{{ Session::get('error') }}",
                    duration: 2000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // top or bottom
                    position: "right", // left, center or right
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "red",
                    },
                    onClick: function() {} // Callback after click
                }).showToast();
            @endif
        });
    </script>
</body>

</html>
