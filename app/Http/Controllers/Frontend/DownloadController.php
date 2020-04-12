<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Faker\Factory as Faker;

class DownloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $faker = Faker::create();
        $types = config('api.available_types');
        $new_types = [];
        foreach ($types as $name => $type) {
            $example = null;
            if ($type['method'] == 'special') {
                // metodi speciali che non esistono in faker di zaninotto
                switch ($name) {
                    case 'name':
                        $example = $faker->firstName().' '.$faker->lastName();
                        break;

                    case 'image':
                        $example = 'http://placeimg.com/640/480/any';
                        break;

                    default:
                        break;
                }
            } else {
                if (isset($type['args'])) {
                    $args = implode(',', $type['args']);
                    $example = $faker->{$type['method']}($args);
                } else {
                    $example = $faker->{$type['method']};
                }
            }

            $new_types[] = [
                'type' => $name,
                'example' => $example
            ];
        }

        return view('download')
            ->with('types', $new_types);
    }
}
