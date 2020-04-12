<?php

namespace App\Http\Resources;

class CreditCard extends BaseResource
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
            'type'              => $this->faker->creditCardType(),
            'number'            => $this->faker->creditCardNumber(),
            'expiration'        => $this->faker->creditCardExpirationDateString(),
            'owner'             => $this->faker->firstName().' '.$this->faker->lastName(),
        ];
    }
}
