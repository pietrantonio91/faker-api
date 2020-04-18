<?php

return [

    'main' => '<h2 class="text-center">
            Genera dati fake e scaricali
        </h2>
        <h4 class="text-center text-muted">
            in formato CSV, Excel, JSON e SQL
        </h4>
        <div class="text-center my-3">
            <img src="'.\URL::to('/').'/assets/img/symbol.png" style="width: 100px;" alt="">
        </div>
        <div class="text-center my-3 py-3">
            <p>
                <strong>Faker API</strong> consente di generare e scaricare file con <strong>dati fake</strong> per utilizzarli come più si preferisce: generare un database, creare una request per una API che stiamo sviluppando...
            </p>
            <p>
                In questa pagina è possibile scegliere il <strong>tipo di file</strong> che si vuole scaricare (CSV, JSON, SQL...), la <strong>quantità</strong> di dati da generare e configurare i vari campi del file.
            </p>
            <p>
                Nella <strong>configurazione dei campi</strong> sarà possibile scegliere tra svariati tipi di campo (gli stessi che si possono trovare nella parte di <a href="/it/#docs">Documentazione delle API</a> sotto la voce Custom).
            </p>
        </div>',
    'configuration' => [
        'title' => 'Configurazione dei campi',
        'field_name' => 'Field name',
        'field_type' => 'Field type',
        'file_type' => 'Tipo di file',
        'table_name' => 'Nome della tabella',
        'rows_number' => 'Numero di righe',
        'change' => 'Cambia',

    ]

];
