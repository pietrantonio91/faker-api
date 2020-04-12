<?php

namespace App\Http\Resources;

class Product extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $price_min = (@$request->_price_min && $request->_price_min != '') ? $request->_price_min : 0.01;
        $price_max = (@$request->_price_max && $request->_price_max != '') ? $request->_price_max : NULL;
        $taxes = (@$request->_taxes && $request->_taxes != '') ? $request->_taxes : 22;
        $categories_type = (@$request->_categories_type && $request->_categories_type != '') ? $request->_categories_type : 'integer'; // string, integer, uuid

        $net_price = $this->faker->randomFloat(2, $price_min, $price_max);
        $price = $net_price*(1+($taxes/100));

        $categories = [];
        $n_categories = rand(1, 10);
        switch ($categories_type) {
            case 'string':
                for ($i=0; $i < $n_categories; $i++) {
                    $categories[] = $this->faker->word();
                }
                break;
            case 'integer':
                for ($i=0; $i < $n_categories; $i++) {
                    $categories[] = $this->faker->randomDigitNotNull();
                }
                break;
            case 'uuid':
                for ($i=0; $i < $n_categories; $i++) {
                    $categories[] = $this->faker->uuid();
                }
                break;
        }

        $tags = [];
        $n_tags = rand(1, 10);
        for ($i=0; $i < $n_tags; $i++) {
            $tags[] = $this->faker->word();
        }

        return [
            'name'          => $this->faker->text(30),
            'description'   => $this->faker->text(),
            'ean'           => $this->faker->ean13(),
            'upc'           => $this->faker->regexify('[0-9]{12}'),
            'image'         => 'http://placeimg.com/640/480/tech',
            'images'        => [
                (new Image($request, $this->faker))->resolve(),
                (new Image($request, $this->faker))->resolve(),
                (new Image($request, $this->faker))->resolve()
            ],
            'net_price' => $net_price,
            'taxes' => $taxes,
            'price' => number_format($price, 2, '.', ''),
            'categories' => array_unique($categories),
            'tags' => $tags
        ];
    }
}
