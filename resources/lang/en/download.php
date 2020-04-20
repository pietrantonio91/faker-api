<?php

return [

    'main' => '<h2 class="text-center">
            Generate fake data and download
        </h2>
        <h4 class="text-center text-muted">
            format: CSV, Excel, JSON e SQL
        </h4>
        <div class="text-center my-3">
            <img src="'.\URL::to('/').'/assets/img/symbol.png" style="width: 100px;" alt="">
        </div>
        <div class="text-center my-3 py-3">
            <p>
                <strong>Faker API</strong> allows to generate and download files with <strong>fake data</strong> to use as you prefer: populating databases, creating API requests for another service...
            </p>
            <p>
                From this page it\'s possible to choose the <strong>file type</strong> we want to download (CSV, JSON, SQL, Excel), the <strong>number of rows</strong> to generate and to configure each file field.
            </p>
            <p>
                From <strong>fields configuration</strong> you will be able to choose between different types of field (the same you can find in the <a href="/en/#docs">APIs Docs</a> below Custom).
            </p>
        </div>',
    'configuration' => [
        'title' => 'Fields configuration',
        'field_name' => 'Field name',
        'field_type' => 'Field type',
        'file_type' => 'File format',
        'table_name' => 'Table name',
        'rows_number' => 'Number of rows',
        'change' => 'Change',

    ]

];
