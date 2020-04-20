<?php

return [
    'current_version' => env('CURRENT_VERSION', '1.0.0'),
    'response_limit_number' => 1000,
    'available_types' => [
        'number' => [
            'method' => 'randomNumber'
        ],
        'text' => [
            'method' => 'realText',
            'args' => [200]
        ],
        'longText' => [
            'method' => 'realText',
            'args' => [1000]
        ],
        'firstName' => [
            'method' => 'firstName'
        ],
        'lastName' => [
            'method' => 'lastName'
        ],
        'name' => [
            'method' => 'special'
        ],
        'email' => [
            'method' => 'email'
        ],
        'phone' => [
            'method' => 'e164PhoneNumber'
        ],
        'date' => [
            'method' => 'date',
            'args' => ['Y-m-d']
        ],
        'dateTime' => [
            'method' => 'dateTime',
        ],
        'image' => [
            'method' => 'special',
        ],
        'word' => [
            'method' => 'word',
        ],
        'streetAddress' => [
            'method' => 'streetAddress',
        ],
        'streetName' => [
            'method' => 'streetName',
        ],
        'buildingNumber' => [
            'method' => 'buildingNumber',
        ],
        'city' => [
            'method' => 'city',
        ],
        'postcode' => [
            'method' => 'postcode',
        ],
        'country' => [
            'method' => 'country',
        ],
        'countryCode' => [
            'method' => 'countryCode',
        ],
        'state' => [
            'method' => 'state',
        ],
        'latitude' => [
            'method' => 'latitude',
        ],
        'longitude' => [
            'method' => 'longitude',
        ],
        'vat' => [
            'method' => 'regexify',
            'args' => ['[0-9]{'.rand(8,11).'}']
        ],
        'website' => [
            'method' => 'domainName',
        ],
        'card_type' => [
            'method' => 'creditCardType',
        ],
        'card_number' => [
            'method' => 'creditCardNumber',
        ],
        'card_expiration' => [
            'method' => 'creditCardExpirationDateString',
        ],
        'ean' => [
            'method' => 'ean13',
        ],
        'upc' => [
            'method' => 'regexify',
            'args' => ['[0-9]{12}']
        ],
        'uuid' => [
            'method' => 'uuid'
        ],
        'counter' => [
            'method' => 'special'
        ],
        'boolean' => [
            'method' => 'boolean'
        ],
        'boolean_digit' => [
            'method' => 'special'
        ],
        'company_name' => [
            'method' => 'company'
        ],
        'null' => [
            'method' => 'special'
        ],
    ]
];
