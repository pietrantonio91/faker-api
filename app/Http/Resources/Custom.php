<?php

namespace App\Http\Resources;

class Custom extends BaseResource
{

    public $available_types = [];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->available_types = config('api.available_types');

        $response = [];

        foreach ($request->all() as $param => $value) {
            if (in_array($param, ['_quantity', '_locale', '_seed'])) {
                continue;
            }

            if (isset($this->available_types[$value]['method'])) {
                $method = $this->available_types[$value]['method'];

                if ($method == 'special') {
                    // metodi speciali che non esistono in faker di zaninotto
                    switch ($value) {
                        case 'name':
                            $response[$param] = $this->faker->firstName().' '.$this->faker->lastName();
                            break;

                        case 'image':
                            $response[$param] = 'http://placeimg.com/640/480/any';
                            break;

                        case 'counter':
                            $response[$param] = $this->counter;
                            break;

                        default:
                            # code...
                            break;
                    }
                } else {
                    if (isset($this->available_types[$value]['args'])) {
                        $args = implode(',', ($this->available_types[$value]['args']));
                        $response[$param] = $this->faker->$method($args);
                    } else {
                        $response[$param] = $this->faker->$method;
                    }
                }
            }
        }

        return $response;
    }
}
