<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::post('/categories', 'store')->name('categories.store');
    Route::put('/categories/{id}', 'update')->name('categories.update');
    Route::delete('/categories/{id}', 'destroy')->name('categories.destroy');
});

Route::controller(MovieController::class)->group(function () {
    Route::get('/movies', 'index')->name('movies.index');
    Route::post('/movies', 'store')->name('movies.store');
    Route::put('/movies/{id}', 'update')->name('movies.update');
    Route::delete('/movies/{id}', 'destroy')->name('movies.destroy');
});
