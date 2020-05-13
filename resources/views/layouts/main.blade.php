<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App: Ratings, Reviews, Trailers</title>

    <!-- favicon -->
    <link rel="icon" href="{{asset('/img/movieapp.png')}}" type="image">

    <!-- css -->
    <link rel="stylesheet" href="/css/main.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/554c424e1c.js" crossorigin="anonymous"></script>

    <!--Livewire-->
    @livewireStyles

    <!--alpine js-->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                <a href="{{ route('movies.index') }}"><img src="{{asset('/img/movieapp.png')}}" alt="movieapp logo" class="w-32"></a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('tv.index') }}" class="hover:text-gray-300">Tv Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                @livewire('search-dropdown')
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                    <img src="{{asset('/img/user.png')}}" alt="user image" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="border border-t border-gray-800">
        <div class="container mx-auto text-sm px-4 py-6">
            Powered by <a href="https://www.themoviedb.org/documentation/api" class="underline hover:text-gray-300">TMDb API</a>
        </div>
    </footer>
    @livewireScripts
    @yield('scripts')
</body>
</html>
