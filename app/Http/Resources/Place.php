<?php

namespace App\Http\Resources;

class Place extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'latitude'          => $this->faker->latitude(),
            'longitude'         => $this->faker->longitude()
        ];
    }
}
