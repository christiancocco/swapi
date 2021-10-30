<?php

namespace ChristianCocco\Swapi\Http\Controllers;

use ChristianCocco\Swapi\Models\People;
use ChristianCocco\Swapi\Models\Planet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SwapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = People::paginate(10);
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $people = People::with(["planet"])->findOrFail($id);
        return $people;
    }
}
