<?php

use Illuminate\Support\Facades\Route;
Use ChristianCocco\Swapi\Http\Controllers\SwapiController;
use ChristianCocco\Swapi\Http\Middleware\HandleInertiaRequests;



Route::group(['middleware' => ['web', HandleInertiaRequests::class]], function () {
    Route::get('/swapi-test', [SwapiController::class, 'swapitest'])->name("swapitest");
});
