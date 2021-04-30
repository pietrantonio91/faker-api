<?php

return [
    'current_version' => env('CURRENT_VERSION', '1.0.0'),
    'response_limit_number' => 1000,
    'available_locales' => [
        'ar_JO',
        'ar_SA',
        'at_AT',
        'bg_BG',
        'bn_BD',
        'cs_CZ',
        'da_DK',
        'de_AT',
        'de_CH',
        'de_DE',
        'el_CY',
        'el_GR',
        'en_AU',
        'en_CA',
        'en_GB',
        'en_HK',
        'en_IN',
        'en_NG',
        'en_NZ',
        'en_PH',
        'en_SG',
        'en_UG',
        'en_US',
        'en_ZA',
        'es_AR',
        'es_ES',
        'es_PE',
        'es_VE',
        'et_EE',
        'fa_IR',
        'fi_FI',
        'fr_BE',
        'fr_CA',
        'fr_CH',
        'fr_FR',
        'he_IL',
        'hr_HR',
        'hu_HU',
        'hy_AM',
        'id_ID',
        'is_IS',
        'it_CH',
        'it_IT',
        'ja_JP',
        'ka_GE',
        'kk_KZ',
        'ko_KR',
        'lt_LT',
        'lv_LV',
        'me_ME',
        'mn_MN',
        'ms_MY',
        'nb_NO',
        'ne_NP',
        'nl_BE',
        'nl_NL',
        'pl_PL',
        'pt_BR',
        'pt_PT',
        'ro_MD',
        'ro_RO',
        'ru_RU',
        'sk_SK',
        'sl_SI',
        'sr_Cyrl_RS',
        'sr_Latn_RS',
        'sr_RS',
        'sv_SE',
        'th_TH',
        'tr_TR',
        'uk_UA',
        'vi_VN',
        'zh_CN',
        'zh_TW',
    ],
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
        'long_text' => [
            'method' => 'realText',
            'see' => 'longText'
        ],
        'firstName' => [
            'method' => 'firstName'
        ],
        'first_name' => [
            'method' => 'firstName',
            'see' => 'firstName'
        ],
        'lastName' => [
            'method' => 'lastName'
        ],
        'last_name' => [
            'method' => 'lastName',
            'see' => 'lastName'
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
        'date_time' => [
            'method' => 'dateTime',
            'see' => 'dateTime',
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
        'street_address' => [
            'method' => 'streetAddress',
            'see' => 'streetAddress',
        ],
        'streetName' => [
            'method' => 'streetName',
        ],
        'street_name' => [
            'method' => 'streetName',
            'see' => 'streetName',
        ],
        'buildingNumber' => [
            'method' => 'buildingNumber',
        ],
        'building_number' => [
            'method' => 'buildingNumber',
            'see' => 'buildingNumber'
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
        'country_code' => [
            'method' => 'countryCode',
            'see' => 'countryCode',
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
        'pokemon' => [
            'method' => 'special'
        ],
    ]
];
