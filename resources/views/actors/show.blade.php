@extends('layouts.main')
@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="parasite" class="w-76">
                <ul class="flex items-center mt-4">
                    @if ($social['facebook'])
                        <li>
                            <a href="{{ $social['facebook'] }}" title="Facebook">
                                <i class="fab fa-facebook-square fa-lg fill-current text-gray-400 w-10"></i>
                            </a>
                        </li>
                    @endif
                    @if ($social['instagram'])
                        <li>
                            <a href="{{ $social['instagram'] }}" title="Instagram">
                                <i class="fab fa-instagram-square fa-lg fill-current text-gray-400 w-10"></i>
                            </a>
                        </li>
                    @endif
                    @if ($social['twitter'])
                        <li>
                            <a href="{{ $social['twitter'] }}" title="Twitter">
                                <i class="fab fa-twitter fa-lg fill-current text-gray-400 w-10"></i>
                            </a>
                        </li>
                    @endif
                    @if ($actor['homepage'])
                        <li>
                            <a href="{{ $actor['homepage'] }}" title="Website" target="_blank">
                                <i class="fas fa-globe-americas fa-lg fill-current text-gray-400 w-10"></i>
                            </a>
                        </li>
                    @endif
                    @if ($social['imdb'])
                        <li>
                            <a href="{{ $social['imdb'] }}" title="imdb">
                                <i class="fab fa-imdb fa-lg fill-current text-gray-400 w-10"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <i class="fas fa-birthday-cake fill-current text-white-400 w-4"></i>
                    <span class="ml-2"> {{ $actor['birthday'] }} ({{ $actor['age'] }} years old) in {{ $actor['place_of_birth'] }}</span>
                </div>
                <h4 class="mt-8 text-white font-semibold">Biography</h4>
                <p class="text-gray-300 mt-4 text-justify">
                    {{ $actor['biography'] }}
                </p>
                <h4 class="font-semibold mt-12">Known For</h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{ $movie['linkToPage'] }}"><img src="{{ $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150"></a>
                            <a href="{{ $movie['linkToPage'] }}" class="text-sm leading-normal block text-green-400 hover:text-white mt-1">{{ $movie['title'] }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>  <!--movie-info ends-->

    <div class="credits border-b border-gray-800">  <!--credits starts-->
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Filmography</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach ($credits as $credit)
                    <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}</li>
                @endforeach
            </ul>
        </div>  <!--container ends-->
    </div>  <!--credits ends-->
@endsection
