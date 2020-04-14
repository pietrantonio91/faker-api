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

    protected $counter = 0;

    public function __construct(Request $request, FakerGenerator $faker, $params = null, $counter = 0)
    {
        $this->faker = $faker;
        $this->params = $params;
        $this->counter = $counter;
    }
}
