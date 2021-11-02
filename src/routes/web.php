<?php

use Illuminate\Support\Facades\Route;
use ChristianCocco\Swapi\Http\Middleware\HandleInertiaRequests;


Route::middleware(['web', HandleInertiaRequests::class])->get('our-package', function () {
    return inertia('Home');
});
