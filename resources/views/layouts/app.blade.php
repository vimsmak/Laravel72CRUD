<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
    
    <livewire:styles />
    <livewire:scripts />

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>    
</head>

<body class="flex flex-wrap justify-center">
    <div class="flex w-full px-4 bg-blue-900 text-white fixed">
        <a class="mx-3 py-4" href="/">Home</a>
        <a class="mx-3 py-4" href="/about">About Us</a>
        <a class="mx-3 py-4" href="/services">Services</a>
        <a class="mx-3 py-4" href="/contact-us">Contact Us</a>       
        @auth
         <a class="mx-3 py-4" href="/userlist">User Lists</a>
         <a class="mx-3 py-4" href="/album">Album</a>
        <livewire:logout />
        @endauth
        @guest
        <div class="py-4">
            <a class="mx-3" href="/login">Login</a>
            <a class="mx-3" href="/register">Register</a>
        </div>
        @endguest
    </div>
    <div class="my-10 w-full justify-center">
        @yield('content')
    </div>

</body>

</html>