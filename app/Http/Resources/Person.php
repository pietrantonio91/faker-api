<?php

namespace App\Http\Resources;

class Person extends BaseResource
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
        $birthday_start = (@$request->_birthday_start && $request->_birthday_start != '') ? $request->_birthday_start : '-90 years';
        $birthday_end = (@$request->_birthday_end && $request->_birthday_end != '') ? $request->_birthday_end : 'now';

        return [
            'firstname'     => $this->faker->firstName($gender),
            'lastname'      => $this->faker->lastName(),
            'email'         => $this->faker->email(),
            'phone'         => $this->faker->e164PhoneNumber(),
            'birthday'      => $this->faker->dateTimeBetween($birthday_start, $birthday_end, $timezone = null)->format('Y-m-d'),
            'gender'        => $gender,
            'address'       => (new Address($request, $this->faker))->resolve(),
            'website'       => 'http://'.$this->faker->domainName(),
            'image'         => 'http://placeimg.com/640/480/people'
        ];
    }
}
