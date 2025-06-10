<?php

use App\Http\Controllers\MovieSearchController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/movies');
/**
 * Movie routes
 */

Route::group(['prefix' => 'movies'], function(){
    Route::get('/', [MovieSearchController::class, 'searchMoviesForm'])->name('movies.search.form');
    Route::get('/search', [MovieSearchController::class, 'searchMovies'])->name('movies.search');

    Route::get('/details/{id}', [MovieSearchController::class, 'movieDetails'])->name('movies.details');
});
