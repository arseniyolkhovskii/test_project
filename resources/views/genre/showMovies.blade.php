@extends('layout.layout')
@section('content')
    <h1>Фильмы с жанром</h1>
    <div class="container">
        <a href="{{ route('movies.create') }}" class="add-movie-btn">Добавить фильм</a>
        <a style="margin-left: 20px" href="{{ route('movies.index') }}" class="add-movie-btn">Список фильмов</a>
        <a style="margin-left: 20px" href="{{ route('genres.index') }}" class="add-movie-btn">Список жанров</a>

        <form action="{{ route('search') }}" style="display: inline-block; margin-left: 15px;">
            <input type="text" name="id" placeholder="Введите ID" class="border p-2 rounded" required>
            <button type="submit" class="add-movie-btn ml-2">Поиск</button>
        </form>
    </div>
    <div class="container">
        @if($genreMovies->isNotEmpty())
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название фильма</th>
                <th>Жанры фильма</th>
                <th>Постер к фильму</th>
            </tr>
            </thead>
            <tbody>
            @foreach($genreMovies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>
                        <div class="link"><a href="{{ route('movies.show', $movie) }}">{{ $movie->title }}</a></div>
                        @if($movie->is_published == 0)
                            <form action="{{ route('movies.publish', $movie) }}" method="POST">
                                @csrf
                                <button class="add-movie-btn1" type="submit">Опубликовать</button>
                            </form>
                        @else
                            <form action="{{ route('movies.unpublish', $movie) }}" method="POST">
                                @csrf
                                <button class="add-movie-btn3" type="submit">Снять с публикации</button>
                            </form>
                        @endif
                        <a class="add-movie-btn2" href="{{ route('movies.edit', $movie) }}">Редактировать</a>
                        <form  action="{{ route('movies.destroy', $movie->id)  }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить?');">
                            @csrf
                            @method('DELETE')
                            <button class="add-movie-btn4" type="submit">Удалить</button>
                        </form>
                    </td>
                    <td style="font-size: 20px">{{ implode(', ', $movie->genres()->pluck('name')->toArray()) }}</td>
                    <td>
                        @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($movie->poster_image))
                            <a href="{{ asset('storage/' . $movie->poster_image) }}">
                                <img src="{{ asset('storage/' . $movie->poster_image) }}" alt="{{ $movie->title }}">
                            </a>
                        @else
                            <a href="{{ asset('storage/images/default.jpg') }}">
                                <img src="{{ asset('storage/images/default.jpg') }}" alt="default_poster"></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <div style="font-size: 25px">Фильмы с данным жанром не найдены</div>
        @endif
        <div class="mt-4 d-flex justify-content-center">
            {{ $genreMovies->links() }}
        </div>
    </div>
@endsection


