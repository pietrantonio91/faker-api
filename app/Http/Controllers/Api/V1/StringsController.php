<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class StringsController extends ApiController
{
    public function index(Request $request)
    {
        return $this->returnResponse($request, 'RandomString');
    }
}
