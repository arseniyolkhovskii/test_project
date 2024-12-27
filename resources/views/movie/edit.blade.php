@extends('layout.layout')
@section('content')
    <h1>Редактировать фильм</h1>
    <div class="container">
        <a href="{{ route('movies.create') }}" class="add-movie-btn flex-shrink-0">Добавить фильм</a>
        <a style="margin-left: 20px" href="{{ route('movies.index') }}" class="add-movie-btn">Список фильмов</a>
        <a style="margin-left: 20px" href="{{ route('genres.index') }}" class="add-movie-btn flex-shrink-0">Список жанров</a>

        <form action="{{ route('search') }}" style="display: inline-block; margin-left: 15px;">
            <input type="text" name="id" placeholder="Введите ID" class="border p-2 rounded" required>
            <button type="submit" class="add-movie-btn ml-2">Поиск</button>
        </form>
    </div>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form style="margin-top: 30px; margin-left: 50px" action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label style="font-size: 20px" for="title">Название фильма</label>
            <input type="text" name="title" id="title" value="{{ $movie->title }}" required>
        </div>
        <div class="form-group">
            <label style="font-size: 20px" for="genres">Жанр фильма</label>
            <div style="font-size: 12px">Используйте Ctrl для выбора нескольких</div>
            <select style="width: 370px; height: 150px;" name="genre_ids[]" id="genres" multiple required>
                @foreach($genres as $genre)
                    <option {{ is_array( $movie->genres->pluck('id')->toArray()) && in_array($genre->id, $movie->genres->pluck('id')->toArray()) ? 'selected' : '' }} value="{{$genre->id}}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label style="font-size: 20px" for="poster">Постер фильма</label>
            <div>
                @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($movie->poster_image))
                    <a href="{{ asset('storage/' . $movie->poster_image) }}">
                        <img style="margin-left: 30px" src="{{ asset('storage/' . $movie->poster_image) }}" alt="{{ $movie->title }}" width="200">
                    </a>
                @else
                    <a href="{{ asset('storage/images/default.jpg') }}">
                        <img style="margin-left: 30px" src="{{ asset('storage/images/default.jpg') }}" alt="default_poster" width="150"></a>
                @endif
            </div>
            <input  type="file" name="poster_image" id="poster">
        </div>
        <button  class="add-movie-btn" type="submit">Обновить</button>
    </form>
    </div>
@endsection


