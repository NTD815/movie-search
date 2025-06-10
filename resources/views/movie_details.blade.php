<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <title>Movies Details</title>
</head>
<body>
    @if($errors->any())
        <ul class="bg-red-400 p-2">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {{-- Search results --}}
        @if(isset($movieData))
            <div class="border-2 p-4">
                <div class="border-2 m-2 object-cover w-fit">
                    <img src="{{ $movieData['Poster'] }}" alt="movie-poster">
                </div>
                <div class="p-2">
                    <div class="flex flex-col">
                        @foreach($movieData as $k => $v)
                            @if($k != 'Poster' && gettype($k) == 'string' && gettype($v) == 'string' && $v)
                                <p>{{ $k }} : {{ $v }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    {{-- End search results --}}
</body>
</html>