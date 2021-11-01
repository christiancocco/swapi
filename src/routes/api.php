<?php
use Illuminate\Support\Facades\Route;
use ChristianCocco\Swapi\Http\Controllers\Api\SwapiController;

Route::get('/api/people', [SwapiController::class, 'index']);
Route::get('/api/people/{id}', [SwapiController::class, 'show']);
