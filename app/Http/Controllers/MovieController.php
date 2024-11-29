<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::select(
            'movies.title',
            'movies.description',
            'movies.director',
            'categories.description AS category',
        )
            ->join('categories', 'movies.category_id', '=', 'categories.id')
            ->get();

        return response()->json(['data' => $movies]);
    }

    public function store(StoreMovieRequest $request)
    {
        $newMovie = Movie::create($request->validated());

        return response()->json(['data' => $newMovie], 201);
    }

    public function update(UpdateMovieRequest $request, int $id)
    {
        Movie::findOrFail($id)->update($request->validated());

        return response()->noContent();
    }

    public function destroy(int $id)
    {
        Movie::destroy($id);

        return response()->noContent();
    }
}
