<?php

use App\Http\Controllers\Movie\GenreController;
use App\Http\Controllers\Movie\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/', [MovieController::class, 'store'])->name('movies.store');
Route::get('/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::patch('/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');


Route::post('/{movie}/publish', [MovieController::class, 'publishMovie'])->name('movies.publish');
Route::post('/{movie}/unpublish', [MovieController::class, 'unpublishMovie'])->name('movies.unpublish');

Route::get('/genres/{id}', [GenreController::class, 'showMovies'])->name('genres.showMovies');



Route::get('movies/search', [MovieController::class, 'search'])->name('search');
