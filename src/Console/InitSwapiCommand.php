<?php

namespace ChristianCocco\Swapi\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use DB;
use ChristianCocco\Swapi\Models\People;
use ChristianCocco\Swapi\Models\Planet;

class InitSwapiCommand extends Command
{
    protected $signature = 'swapi:init';

    protected $description = 'Init the Swapi Data';

    public function handle()
    {
        $this->info('Initializing Swapi Data...');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        People::truncate();
        Planet::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $endpoint = config('swapipackage.endpoint');
        $client = new \GuzzleHttp\Client(['verify' => false]);

        //Loading Planets from Swapi API
        $res = $client->request('GET', $endpoint . 'planets/');
        if ($res->getStatusCode() == 200) {
            $responseObject = json_decode($res->getBody()->getContents());
            if ($responseObject) {
                $count = $responseObject->count;
                //$pages  = ($count % 10) + 1;
                $this->comment(sprintf("Fetching %s planets...", $responseObject->count));
                $i = 1;
                $page = 1;
                do {
                    $pageNext = $responseObject->next;
                    //$this->comment(sprintf("Page %s", $page));
                    foreach ($responseObject->results as $key => $planet) {
                        $this->comment(sprintf("Inserting planet %s of %s", $i, $responseObject->count));
                        $id = $this->extractId($planet->url);
                        $dataPlanet = [
                            "id" => $id,
                            "name" => $planet->name,
                            "rotation_period" => $planet->rotation_period,
                            "orbital_period" => $planet->orbital_period,
                            "diameter" => $planet->diameter,
                            "climate" => $planet->climate,
                            "gravity" => $planet->gravity,
                            "terrain" => $planet->terrain,
                            "surface_water" => $planet->surface_water,
                            "population" => $planet->population
                        ];
                        $planet = Planet::create($dataPlanet);
                        $i++;
                    }
                    if ($pageNext) {
                        $res = $client->request('GET', $pageNext);
                        $responseObject = json_decode($res->getBody()->getContents());
                        $page++;
                    }
                } while ($pageNext);
            }
            //Loading People from Swapi API
            $res = $client->request('GET', $endpoint . 'people/');
            if ($res->getStatusCode() == 200) {
                $responseObject = json_decode($res->getBody()->getContents());
                if ($responseObject) {
                    $count = $responseObject->count;
                    //$pages  = ($count % 10) + 1;
                    $this->comment(sprintf("Fetching %s people...", $responseObject->count));
                    $i = 1;
                    $page = 1;
                    do {
                        $pageNext = $responseObject->next;
                        //$this->comment(sprintf("Page %s", $page));
                        foreach ($responseObject->results as $key => $people) {
                            $this->comment(sprintf("Inserting people %s of %s", $i, $responseObject->count));
                            $id = $this->extractId($people->url);
                            $idPlanet = $this->extractId($people->homeworld);
                            $dataPeople = [
                                "id" => $id,
                                "name" => $people->name,
                                "height" => $people->height,
                                "mass" => $people->mass,
                                "hair_color" => $people->hair_color,
                                "skin_color" => $people->skin_color,
                                "eye_color" => $people->eye_color,
                                "birth_year" => $people->birth_year,
                                "gender" => $people->gender,
                                "planet_id" => $idPlanet
                            ];
                            $people = People::create($dataPeople);
                            $i++;
                        }
                        if ($pageNext) {
                            $res = $client->request('GET', $pageNext);
                            $responseObject = json_decode($res->getBody()->getContents());
                            $page++;
                        }
                    } while ($pageNext);
                }
            }
        }

        $this->info('Swapi Data loaded!');
    }

    private function extractId($url)
    {
        $string = rtrim($url, '/');
        $urlArray = explode("/", $string);
        $id = $urlArray[count($urlArray) - 1];
        return $id;
    }
}
