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
    public function index(Request $request)
    {
        $query = "";
        if ($request->has('query')) {
            $query = $request->get('query');
        };
        $sort = "";
        if ($request->has('sort')) {
            $sort = $request->get('sort');
        };
        $sortVer = "ASC";
        if ($request->has('sortVer')) {
            $sortVer = $request->get('sortVer');
        };
        $itemPerPage = 10;
        if ($request->has('numitem')) {
            $itemPerPage = $request->get('numitem');
        };

        $results = People::when($query != "null" && $query != '', function($q) use($query) {
            $q->where("name", "like", '%' . $query . '%');
            $q->orWhere("hair_color", "like", '%' . $query . '%');
            $q->orWhere("eye_color", "like", '%' . $query . '%');
            $q->orWhere("skin_color", "like", '%' . $query . '%');
            $q->orWhere("mass", "like", '%' . $query . '%');
            $q->orWhere("height", "like", '%' . $query . '%');
            $q->orWhere("gender", "like", '%' . $query . '%');
        })
        ->when($sort != "null" && $sort != '', function($q) use($sort, $sortVer) {
            $q->orderBy($sort, $sortVer);
        })
        ->paginate($itemPerPage);
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
