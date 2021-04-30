<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;

class RandomString extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $length = (@$request->_length && $request->_length != '') ? $request->_length : 10;

        $string = Str::random($length);

        return [
            'string'         => $string,
            'hash'           => [
                'md5'       => md5($string),
                'sha1'      => sha1($string),
                'sha256'    => hash('sha256', $string)
            ]
        ];
    }
}
