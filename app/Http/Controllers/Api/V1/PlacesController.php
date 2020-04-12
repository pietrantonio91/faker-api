<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Place;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class PlacesController extends ApiController
{
    public function index(Request $request)
    {
        return $this->returnResponse($request, 'Place');
    }
}
