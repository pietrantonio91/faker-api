<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Faker\Generator as FakerGenerator;
use Illuminate\Http\Request;

class BaseResource extends JsonResource
{
    protected $faker;

    protected $params;

    protected $genders = ['male', 'female'];

    public function __construct(Request $request, FakerGenerator $faker, $params = null)
    {
        $this->faker = $faker;
        $this->params = $params;
    }
}
