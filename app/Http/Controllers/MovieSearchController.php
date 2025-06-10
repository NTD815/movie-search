<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieSearchRequest;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class MovieSearchController extends Controller
{
    public function searchMoviesForm(): View
    {
        return view('movies');
    }

    public function searchMovies(MovieSearchRequest $request): View
    {
        $apiKey = config('services.omdb_api_key');

        $params = '';
        if($request->title){
            $params = $params . "&t={$request->title}";
        }

        if($request->year){
            $params = $params . "&y={$request->year}";
        }

        $response = Http::get("http://www.omdbapi.com/?apikey={$apiKey}{$params}");

        if($response->successful()){
            $data = [
                'movieData' => $response->json()
            ];
            return view('movies')->with($data);
        }else{
            return view('movies')->with([
                'movieSearchError' => 'An error occured while getting movies.'
            ]);
        }
    }

    public function movieDetails(string $id): View
    {
        $apiKey = config('services.omdb_api_key');

        $params = "&i={$id}";
        
        $response = Http::get("http://www.omdbapi.com/?apikey={$apiKey}{$params}");

        if($response->successful()){
            $data = [
                'movieData' => $response->json()
            ];
            return view('movie_details')->with($data);
        }else{
            return view('movie_details')->with([
                'movieSearchError' => 'An error occured while getting movies.'
            ]);
        }
    }
}
