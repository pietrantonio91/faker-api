<?php

namespace App\Http\Resources;

class Emoji extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $emoji = $this->faker->emoji();
        return [
            'content'       => "$emoji",
            'unicode'       => $emoji,
        ];
    }
}
