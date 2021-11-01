<?php
use Illuminate\Support\Facades\Route;
use ChristianCocco\Swapi\Http\Controllers\SwapiController;

Route::get('swapi', [SwapiController::class, 'index']);
?>
