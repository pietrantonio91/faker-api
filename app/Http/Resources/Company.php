<?php

namespace App\Http\Resources;

class Company extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $addresses = [];
        $n_addresses = rand(1, 5);
        for ($i=0; $i < $n_addresses; $i++) {
            $addresses[] = (new Address($request, $this->faker))->resolve();
        }

        return [
            'name'          => $this->faker->company(),
            'email'         => $this->faker->email(),
            'vat'           => $this->faker->regexify('[0-9]{'.rand(8,11).'}'),
            'phone'         => $this->faker->e164PhoneNumber(),
            'country'       => $this->faker->country(),
            'addresses'     => $addresses,
            'website'       => 'http://'.$this->faker->domainName(),
            'image'         => 'http://placeimg.com/640/480/people',
            'contact'       => (new Person($request, $this->faker))->resolve(),
        ];
    }
}
