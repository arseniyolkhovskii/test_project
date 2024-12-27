@extends('layout.layout')
@section('content')
    <h1>Информация о фильме</h1>
    <div class="container">
        <a href="{{ route('movies.create') }}" class="add-movie-btn">Добавить фильм</a>
        <a style="margin-left: 20px" href="{{ route('movies.index') }}" class="add-movie-btn">Список фильмов</a>
        <a style="margin-left: 20px" href="{{ route('genres.index') }}" class="add-movie-btn">Список жанров</a>

        <form action="{{ route('search') }}" style="display: inline-block; margin-left: 15px">
            <input type="text" name="id" placeholder="Введите ID" class="border p-2 rounded" required>
            <button type="submit" class="add-movie-btn ml-2">Поиск</button>
        </form>
    </div>
    <div class="container">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название фильма</th>
                <th>Жанр фильма</th>
                <th>Статус фильма</th>
                <th>Дата добавления</th>
                <th>Дата последнего обновления</th>
                <th>Постер к фильму</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-size: 20px">{{ $movie->id }}</td>
                    <td style="font-size: 20px">{{ $movie->title }}</td>
                    <td style="font-size: 20px">{{ implode(', ', $movie->genres()->pluck('name')->toArray()) }}</td>
                    <td style="font-size: 20px">{{ $movie->is_publised = 1 ? 'Опубликован' : 'Не опубликован' }}</td>
                    <td style="font-size: 20px">{{ $movie->created_at }}</td>
                    <td style="font-size: 20px">{{ $movie->updated_at }}</td>
                    <td>
                        @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($movie->poster_image))
                        <a href="{{ asset('storage/' . $movie->poster_image) }}" target="_blank">
                            <img src="{{ asset('storage/' . $movie->poster_image) }}" alt="{{ $movie->title }}">
                        </a>
                        @else
                            <a href="{{ asset('storage/images/default.jpg') }}">
                                <img src="{{ asset('storage/images/default.jpg') }}" alt="default_poster"></a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection


