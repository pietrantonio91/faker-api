<?php

namespace App\Http\Resources;

class Text extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $characters = (@$request->_characters && $request->_characters != '') ? $request->_characters : 200;

        return [
            'title'         => $this->faker->realText(20),
            'author'        => $this->faker->firstName().' '.$this->faker->lastName(),
            'genre'         => ucfirst($this->faker->word()),
            'content'       => $this->faker->realText($characters)
        ];
    }
}
