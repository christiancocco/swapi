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
     * @param
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $req = Request::create('/api/people', 'GET');
        $res = app()->handle($req);
        $responseBody = $res->getContent();
        return view('swapi::index', ['people' => json_decode($responseBody)]);
    }
}
