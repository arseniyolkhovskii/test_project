@extends('layout.layout')
@section('content')
    <h1>Список жанров</h1>
    <div class="container">
        <a href="{{ route('movies.create') }}" class="add-movie-btn">Добавить фильм</a>
        <a style="margin-left: 20px" href="{{ route('movies.index') }}" class="add-movie-btn">Список фильмов</a>
            <form action="{{ route('search') }}" style="display: inline-block; margin-left: 15px;">
                <input type="text" name="id" placeholder="Введите ID" class="border p-2 rounded" required>
                <button type="submit" class="add-movie-btn ml-2">Поиск</button>
            </form>
        </form>
    </div>
    <div class="container">
        <table>
            <thead>
            <tr>
                <th>Название жанра</th>
            </tr>
            </thead>
            <tbody>
            @foreach($genres as $genre)
                <tr>
                   <td style="font-size: 20px"><a class="link" href="{{ route('genres.showMovies', $genre) }}">{{ $genre->name }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4 d-flex justify-content-center">
            {{ $genres->links() }}
        </div>
    </div>
@endsection


