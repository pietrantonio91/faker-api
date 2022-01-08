<?php

namespace App\Http\Resources;

class Address extends BaseResource
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
            'id'                => $this->counter,
            'street'            => $this->faker->streetAddress(),
            'streetName'        => $this->faker->streetName(),
            'buildingNumber'    => $this->faker->buildingNumber(),
            'city'              => $this->faker->city(),
            'zipcode'           => $this->faker->postcode(),
            'country'           => $this->faker->country(),
            'county_code'       => $this->faker->countryCode(),
            'latitude'          => $this->faker->latitude(),
            'longitude'         => $this->faker->longitude()
        ];
    }
}
