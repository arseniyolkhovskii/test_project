<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $guarded = false;

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'genre_movies', 'genre_id', 'movie_id');
    }
}
