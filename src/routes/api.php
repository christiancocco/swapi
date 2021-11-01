<?php
use Illuminate\Support\Facades\Route;
use ChristianCocco\Swapi\Http\Controllers\Api\SwapiPeopleController;

Route::get('/api/people', [SwapiPeopleController::class, 'index']);
Route::get('/api/people/{id}', [SwapiPeopleController::class, 'show']);
