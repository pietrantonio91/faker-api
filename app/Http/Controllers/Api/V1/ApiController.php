<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class ApiController extends Controller
{

    protected $genders = ['male', 'female'];

    protected function returnResponse(Request $request, string $resource)
    {
        $results = [];

        $params = $this->getParams($request);
        $faker = Faker::create($params->language);
        if($params->seed) $faker->seed($params->seed);

        $resource = 'App\\Http\\Resources\\'.$resource;
        for ($i=0; $i < $params->quantity; $i++) {
            $results[] = (new $resource($request, $faker, $params, $i + 1))->resolve();
        }

        return response()
            ->json([
                'status' => 'OK',
                'code' => 200,
                'total' => count($results),
                'data' => $results
            ], 200);
    }

    protected function getParams(Request $request)
    {
        $q = (@$request->_quantity && $request->_quantity != '') ? $request->_quantity : 10;
        // quantity max 1000
        if($q > config('api.response_limit_number'))
            $q = config('api.response_limit_number');

        $l = (@$request->_locale && $request->_locale != '') ? $request->_locale : 'en_US';

        $s = (@$request->_seed && $request->_seed != '') ? $request->_seed : null;

        return (object)[
            'quantity' => $q,
            'language' => $l,
            'seed' => $s
        ];
    }
}
