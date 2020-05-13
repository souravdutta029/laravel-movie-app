<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class ActorDetailsViewModel extends ViewModel
{
    public $actor;
    public $social;
    public $credits;

    public function __construct($actor, $social, $credits)
    {
        $this->actor = $actor;
        $this->social = $social;
        $this->credits = $credits;
    }


    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday'     => Carbon::parse($this->actor['birthday'])->format('d M, Y'),
            'age'          => Carbon::parse($this->actor['birthday'])->age,
            'profile_path' => $this->actor['profile_path']
            ? 'https://image.tmdb.org/t/p/w300/'.$this->actor['profile_path']
            : 'https://ui-avatars.com/api/?size=300&name='.$actor['name'],
        ]);
    }


    public function social()
    {
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/'.$this->social['twitter_id'] : null,
            'facebook' => $this->social['facebook_id'] ? 'https://facebook.com/'.$this->social['facebook_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://instagram.com/'.$this->social['instagram_id'] : null,
            'imdb' => $this->social['imdb_id'] ? 'https://imdb.com/name/'.$this->social['imdb_id'] : null,
        ]);
    }


    public function knownForMovies()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->sortByDesc('popularity')->take(5)->map(function($movie){
            if(isset($movie['title'])){
                $title = $movie['title'];
            }elseif(isset($movie['name'])){
                $title = $movie['name'];
            }else{
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w185/'.$movie['poster_path']
                    : 'https://via.placeholder.com/185x278',

                'title'  => $title,
                'linkToPage' => $movie['media_type'] == 'movie' ? route('movies.show', $movie['id']) : route('tv.show', $movie['id'])
            ])->only([
                'poster_path', 'title', 'id', 'media_type', 'linkToPage',
            ]);
        });
    }

    public function credits()
    {
        $castMovies = collect($this->credits)->get('cast');

        return collect($castMovies)->map(function($movie){
            if(isset($movie['release_date'])){
                $releaseDate = $movie['release_date'];
            }elseif(isset($movie['first_air_date'])){
                $releaseDate = $movie['first_air_date'];
            }else{
                $releaseDate = '';
            }


            if(isset($movie['title'])){
                $title = $movie['title'];
            }elseif($movie['name']){
                $title = $movie['name'];
            }else{
                $title = '';
            }


            return collect($movie)->merge([
                    'release_date' => $releaseDate,
                    'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
                    'title' => $title,
                    'character' => isset($movie['character']) ? $movie['character'] : '',
                ]);
            })->sortByDesc('release_date');
    }
}
