<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Custom;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class CustomController extends ApiController
{

    public function index(Request $request)
    {
        $request_data = $request->all();
        unset($request_data['_quantity']);
        unset($request_data['_locale']);
        if (count($request_data) > 0) {
            foreach ($request_data as $label => $type) {
                if(!in_array($type, array_keys(config('api.available_types')))) {
                    return response()
                        ->json([
                            'status' => 'Bad Request. Wrong parameter type \''.$type.'\'.',
                            'code' => 400,
                            'total' => 0
                        ], 400);
                }
            }
        } else {
            return response()
                ->json([
                    'status' => 'Bad Request. This resource require at least one parameter.',
                    'code' => 400,
                    'total' => 0
                ], 400);
        }

        $results = [];

        $params = $this->getParams($request);
        $faker = Faker::create($params->language);
        if($params->seed) $faker->seed($params->seed);

        for ($i=0; $i < $params->quantity; $i++) {
            $results[] = (new Custom($request, $faker, $params))->resolve();
        }

        return response()
            ->json([
                'status' => 'OK',
                'code' => 200,
                'total' => count($results),
                'data' => $results
            ], 200);
    }
}
