<?php

namespace App\Http\Resources;

class User extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $gender = (@$request->_gender && $request->_gender != '') ? $request->_gender : $this->genders[array_rand($this->genders)];

        return [
            'id'            => $this->counter,
            'uuid'          => $this->faker->uuid(),
            'firstname'     => $this->faker->firstName($gender),
            'lastname'      => $this->faker->lastName(),
            'username'      => $this->faker->userName(),
            'password'      => $this->faker->password(),
            'email'         => $this->faker->email(),
            'ip'            => $this->faker->ipv4(),
            'macAddress'    => $this->faker->macAddress(),
            'website'       => 'http://'.$this->faker->domainName(),
            'image'         => 'http://placeimg.com/640/480/people',
        ];
    }
}
