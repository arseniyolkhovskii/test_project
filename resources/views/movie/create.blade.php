@extends('layout.layout')
@section('content')
    <h1>Добавить фильм</h1>
    <div class="container">
        <a href="{{ route('movies.create') }}" class="add-movie-btn flex-shrink-0">Добавить фильм</a>
        <a style="margin-left: 20px" href="{{ route('movies.index') }}" class="add-movie-btn">Список фильмов</a>
        <a style="margin-left: 20px" href="{{ route('genres.index') }}" class="add-movie-btn flex-shrink-0">Список жанров</a>

        <form action="{{ route('search') }}"  style="display: inline-block; margin-left: 15px;">
            <input type="text" name="id" placeholder="Введите ID" class="border p-2 rounded" required>
            <button type="submit" class="add-movie-btn ml-2">Поиск</button>
        </form>
    </div>
    <form style="margin-top: 30px; margin-left: 50px" action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label style="font-size: 20px" for="title">Название фильма</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label style="font-size: 20px" for="genres">Жанр фильма</label>
            <div style="font-size: 12px">Используйте Ctrl для выбора нескольких</div>
            <select  class="select2" style="width: 370px; height: 150px;" name="genre_ids[]" id="genres" multiple required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ in_array($genre->id, old('genres', [])) ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label style="font-size: 20px" for="poster">Постер фильма</label>
            <input type="file" name="poster_image" id="poster">
        </div>
        <button class="add-movie-btn" type="submit">Добавить фильм</button>
    </form>
    </div>
@endsection


