<?php

use App\Http\Controllers\Movie\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');


