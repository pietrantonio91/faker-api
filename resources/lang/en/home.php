<?php

return [
    'what' => [
        'main' => "<p>
                Faker API it's a collection of <strong>completely free APIs</strong> that helps web developers and web designers generate <strong>fake data</strong> in a fast adn easy way. No registration is required. No tokens, no authentication.
            </p>
            <p>
                Every resource allows to choose the API language by \"_locale\" parameter and also allows to select the number of rows requested by \"_quantity\" parameter. <strong>Max 1000 rows</strong>.
            </p>
            <p>
                Read the <a href=\"javascript:scrollTo('docs')\">Docs</a> to read more about every resource. In addition, it's available the <strong>Postman collection</strong> to use these APIs directly in the well-known client.
            </p>
            <p>
                At the end of this page yu'll find the <a href=\"javascript:scrollTo('test')\">Test</a> section, where you can test our APIs throug the specific form.
            </p>",
        'current' => 'Current version:'
    ],
    'docs' => [
        'intro' => '<p>
                No registration is required. No tokens, no keys or other types of authentication. Faker API it\'s a free service for every developer who want to use it.
            </p>',
        'postman' => '<p>
            <strong>Postman:</strong><br>
            Download here the Postman collection (v 2.1)<br>
            <a href="/Faker API.postman_collection.json" class="btn btn-postman mt-3" download><svg class="i-import" viewBox="0 0 32 32" width="24" height="24" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M28 22 L28 30 4 30 4 22 M16 4 L16 24 M8 16 L16 24 24 16"></path>
            </svg> Download Postman Collection</a>
            </p>',
        'basic_usage' => '<p>
                Some resource allows to filter data by GET parameters.<br>
                The names of these parameters are always preceded by an underscore character "_", for example:
                <pre><code class="html">'.\URL::to('/').'/api/v1/images?_width=380</code></pre>
            </p>
            <p>
                Data are always wrapped inside "data" and are always returned with the total number of rows ("total") and with the Http response code.
            </p>
            <p>
                Every resource accepts 3 GET common parameters:
            </p>',
        '_locale' => '<p>
                Default: en_US
            </p>
            <p>
                This parameter means the language of the API response we want to get and accept the locale format "en_EN". For example:
            </p>
            <pre><code class="html">'.\URL::to('/').'/api/v1/persons?_locale=fr_FR</code></pre>
            <p>
                This example return people with french names.
            </p>',
        '_quantity' => '<p>
                Default: 10
            </p>
            <p>
                Max: 1000
            </p>
            <p>
                This parameter means the number of rows we want to obtain and accept only integers. If you request more than 1000 rows (maximum) the system will return 1000 rows anyway. Example:
            </p>
            <pre><code class="html">'.\URL::to('/').'/api/v1/companies?_quantity=5</code></pre>
            <p>
                This example return 5 companies.
            </p>',
        '_seed' => '<p>
                Default: null
            </p>
            <p>
                This parameter accept an integer and allowas to get always the same results. So, executing the same request with _seed parameter set to the same number (ex. 12345) the results will never change. Example:
            </p>
            <pre><code class="html">'.\URL::to('/').'/api/v1/companies?_seed=12456</code></pre>',
        'resources' => [
            'custom' => '<p>
                    This resource is the only one which does\'nt follow the same rules of the others.<br>
                    The 3 common parameters (_quantity, _locale, _seed) have the same usage of the other resources, but this request it\'s managed in a different way.
                </p>
                <p>
                    Request to this resource accepts custom parameters following this pattern:
                </p>
                <pre><code class="html"><i>myCustomName1</i>=<b>customType1</b>&<i>myCustomName2</i>=<b>customType2</b><br></code></pre>
                <p>
                    where <i>myCustomName1</i> and <i>myCustomName2</i> are my custom parameters names, and <b>customType1</b> and <b>customType2</b> are my custom parameters types. See below the allowed types.
                </p>
                <p>
                    This allows to make a custom ad hoc resource, using type parameters listed below:
                </p>'
        ]
    ]
];
