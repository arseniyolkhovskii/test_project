<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movie\StoreRequest;
use App\Http\Requests\Movie\UpdateRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(3);
        return view('movie.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movie.create', compact('genres'));
    }
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movie.edit', compact('movie', 'genres'));
    }
    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }
    public function destroy(Movie $movie)
    {
        $movie->delete();

        if ($movie->poster_image != 'images/default.jpg') {
            Storage::disk('public')->delete($movie->poster_image);
        }
        return redirect()->back()->withInput();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

            if (!empty($data['poster_image'])) {
                $data['poster_image'] = Storage::disk('public')->put('/images', $data['poster_image']);
            } else {
                $data['poster_image'] = 'images/default.jpg';
            }

            if (!empty($data['genre_ids'])) {
                $genreIds = $data['genre_ids'];
            } else {
                $genreIds = [];
            }
            unset($data['genre_ids']);

            $movie = Movie::create($data);
            $movie->genres()->attach($genreIds);

        return redirect()->route('movies.index')->with('message', 'Фильм добавлен!');
    }
    public function update(UpdateRequest $request, Movie $movie)
    {
        $data = $request->validated();

            if (!empty($data['poster_image']) && $movie->poster_image) {
                $data['poster_image'] = Storage::disk('public')->put('/images', $data['poster_image']);
                if ($movie->poster_image != 'images/default.jpg') {
                Storage::disk('public')->delete($movie->poster_image);
                }
            } else {
                $data['poster_image'] = 'images/default.jpg';
            }

            if (!empty($data['genre_ids'])) {
                $genreIds = $data['genre_ids'];
            } else {
                $genreIds = [];
            }
            unset($data['genre_ids']);

            $movie->update($data);
            $movie->genres()->sync($genreIds);

        return redirect()->back()->with('message', 'Фильм обновлен!');
    }
    public function publishMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->is_published = 1;
        $movie->save();

        return redirect()->back()->withInput();

    }

    public function unpublishMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->is_published = 0;
        $movie->save();

        return redirect()->back()->withInput();
    }
    public function search(Request $request)
    {
        $id = $request->input('id');
        $movie = Movie::find($id);

        return view('movie.search', compact('movie'));
    }


}
