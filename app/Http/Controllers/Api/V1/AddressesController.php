<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class AddressesController extends ApiController
{
    public function index(Request $request)
    {
        return $this->returnResponse($request, 'Address');
    }
}
