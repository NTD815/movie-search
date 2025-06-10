<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <title>Movies Search</title>
</head>
<body>
    @if($errors->any())
        <ul class="bg-red-400 p-2">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {{-- Search by Movie title --}}
        <div class="search-by-title border p-4">
            <form action="{{ route('movies.search') }}" method="get">
                <p class="underline my-2">Search by title</p>
                <div class="flex flex-col">
                    <div class="inline mb-4">
                        <label for="title_1">Title:</label>
                        <input type="text" id="title_1" name="title" class="border-2 border-gray-500">
                    </div>

                    <div class="inline mb-4">
                        <label for="year_1">Year:</label>
                        <input type="text" id="year_1" name="year" class="border-2 border-gray-500">
                    </div>

                    <div class="inline">
                        <button type="submit" class="p-2 rounded-xs border-2 cursor-pointer">Search</button>
                        <button type="button" id="reset_search_by_title" class="p-2 rounded-xs border-2 cursor-pointer">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    {{-- End search by movie title form --}}

    {{-- Search results --}}
        @if(isset($movieData))
            <div class="border-2 p-4">
                <div class="border-2 m-2 object-cover">
                    <img src="{{ $movieData['Poster'] }}" alt="movie-poster">
                </div>
                <div class="p-2">
                    <div class="flex flex-col">
                        <p>Title: {{ $movieData['Title'] }}</p>
                        <p>Title: {{ $movieData['Year'] }}</p>
                        <a href="{{ route('movies.details', $movieData['imdbID']) }}">Details</a>
                    </div>
                </div>
            </div>
        @endif
    {{-- End search results --}}
</body>
</html>