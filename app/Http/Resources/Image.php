<?php

namespace App\Http\Resources;

class Image extends BaseResource
{
    protected $img_types = [
        'any',
        'animals',
        'architecture',
        'nature',
        'people',
        'tech',
        'kittens',
        'pokemon'
    ];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $type = (@$request->_type && $request->_type != '' && in_array($request->_type, $this->img_types)) ? $request->_type : 'any';
        $width = (@$request->_width && $request->_width != '') ? $request->_width : null;
        $height = (@$request->_height && $request->_height != '') ? $request->_height : null;

        $x = $width ?? '640';
        $y = $height ?? '480';
        $url = 'http://placeimg.com/'.$x.'/'.$y.'/'.$type;
        if ($type == 'kittens') {
            $x = $width ?? $this->faker->randomDigitNotNull().'00';
            $y = $height ?? $this->faker->randomDigitNotNull().'00';
            $url = 'https://placekitten.com/'.$x.'/'.$y;
        }
        if ($type == 'pokemon') {
            $x = $width ?? $this->faker->randomDigitNotNull().'00';
            $y = $height ?? $this->faker->randomDigitNotNull().'00';
            $url = 'https://lorempokemon.fakerapi.it/pokemon/'.$x.'/'.$y;
        }

        return [
            'title'         => $this->faker->text(30),
            'description'   => $this->faker->text(),
            'url'           => $url,
        ];
    }
}
