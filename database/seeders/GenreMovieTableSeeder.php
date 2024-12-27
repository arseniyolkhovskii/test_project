<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class GenreMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = Genre::all();
        $movies = Movie::all();

        foreach ($movies as $movie) {

            $randomGenreId = $genres->random(1)->pluck('id');

            $movie->genres()->attach($randomGenreId);

        }
    }
}
