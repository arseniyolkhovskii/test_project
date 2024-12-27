<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::paginate(5);
        return view('genre.index', compact('genres'));
    }

    public function showMovies($id)
    {
        $genre = Genre::findOrFail($id);
        $genreMovies = $genre->movies()->paginate(1);
        return view('genre.showMovies', compact('genreMovies', 'genre'));
    }
}
