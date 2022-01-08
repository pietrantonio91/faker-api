<?php

namespace App\Http\Resources;

class Book extends BaseResource
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
            'id'            => $this->counter,
            'title'         => $this->faker->realText(20),
            'author'        => $this->faker->firstName().' '.$this->faker->lastName(),
            'genre'         => ucfirst($this->faker->word()),
            'description'   => $this->faker->realText(200),
            'isbn'          => $this->faker->isbn13(),
            'image'         => 'http://placeimg.com/480/640/any',
            'published'     => $this->faker->date('Y-m-d', 'now'),
            'publisher'     => ucfirst($this->faker->word()).' '.ucfirst($this->faker->word())
        ];
    }
}
