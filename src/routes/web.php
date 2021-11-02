<?php

use Illuminate\Support\Facades\Route;
Use ChristianCocco\Swapi\Http\Controllers\SwapiController;
use ChristianCocco\Swapi\Http\Middleware\HandleInertiaRequests;



Route::group(['middleware' => ['web', HandleInertiaRequests::class]], function () {
    Route::get('/swapitest', [SwapiController::class, 'swapitest'])->name("swapitest");
});

Route::middleware(['web', HandleInertiaRequests::class])->get('our-package', function () {
    return inertia('Home');
    //Route::get('/swapitest', [SwapiController::class, 'swapitest'])->name("swapitest");
});
