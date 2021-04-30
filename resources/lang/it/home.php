<?php

return [
    'what' => [
        'main' => "<p>
                Faker API è un <strong>servizio API completamente gratuito</strong> che permette di generare <strong>dati fake</strong> in modo semplice e veloce, tutto tramite RESTful APIs. Non richiede nessuna iscrizione né l'utilizzo di token o altri sistemi di autenticazione.
            </p>
            <p>
                Ogni risorsa permette la localizzazione in lingua tramite il parametro \"_locale\" e consente inoltre di scegliere la quantità di dati da generare tramite il parametro \"_quantity\", fino a un massimo di <strong>1000 elementi</strong>.
            </p>
            <p>
                Nel paragrafo <a href=\"javascript:scrollTo('docs')\">Documentazione</a> è possibile approfondire ogni risorsa. È inoltre disponibile la <strong>collection di Postman</strong> per poter utilizzare le nostre API tramite il noto client.
            </p>
            <p>
                Al fondo di questa pagina, nella sezione <a href=\"javascript:scrollTo('test')\">Test</a>, sarà invece possibile testare le nostre API tramite un apposito form.
            </p>",
        'current' => 'Current version:'
    ],
    'docs' => [
        'intro' => '<p>
                Non è richiesta nessuna chiave o token per l’utilizzo di Faker API. È un servizio gratuito e assolutamente
                open-source.
            </p>',
        'postman' => '<p>
            <strong>Postman:</strong><br>
            Scarica la collection di Postman (versione 2.1)<br>
            <a href="/Faker API.postman_collection.json" class="btn btn-postman mt-3" download><svg class="i-import" viewBox="0 0 32 32" width="24" height="24" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M28 22 L28 30 4 30 4 22 M16 4 L16 24 M8 16 L16 24 24 16"></path>
            </svg> Download Postman Collection</a>
            </p>',
        'basic_usage' => '<p>
                Alcune risorse permettono di filtrare i risultati in base ai parametri GET che vengono passati.<br>
                I nomi di questi parametri sono sempre preceduti da un underscore "_", ad esempio:
                <pre><code class="html">'.\URL::to('/').'/api/v1/images?_width=380</code></pre>
            </p>
            <p>
                I dati sono sempre wrappati dentro a "data" e sono sempre accompagnati dal numero totale ("total") e dal codice Http della response.
            </p>
            <p>
                Tutte le risorse accettano 3 parametri GET comuni:
            </p>',
        '_locale' => '<p>
                Default: en_US
            </p>
            <p>
                Il parametro indica la localizzazione dei risultati che si vogliono ottenere e accetta il formato di tipo
                "it_IT". Esempio:
            </p>
            <pre><code class="html">'.\URL::to('/').'/api/v1/persons?_locale=fr_FR</code></pre>
            <p>
                Questo esempio restituisce delle persone con nomi appartenenti alla lingua francese.
            </p>',
        '_quantity' => '<p>
                Default: 10
            </p>
            <p>
                Max: 1000
            </p>
            <p>
                Il parametro indica la quantità di risultati che si vogliono ottenere e accetta solo numeri interi. Se si
                richiedono più di 1000 risultati il sistema restituisce comunque 1000 risultati. Esempio:
            </p>
            <pre><code class="html">'.\URL::to('/').'/api/v1/companies?_quantity=5</code></pre>
            <p>
                Questo esempio restituisce 5 aziende.
            </p>',
        '_seed' => '<p>
                Default: null
            </p>
            <p>
                Il parametro accetta un numero intero e consente di ottenere più volte gli stessi risultati. Quindi
                eseguendo la stessa richiesta con il parametro _seed valorizzato con un numero (es. 12456) i risultati non
                cambieranno mai. Esempio:
            </p>
            <pre><code class="html">'.\URL::to('/').'/api/v1/companies?_seed=12456</code></pre>',
        'resources' => [
            'custom' => '<p>
                    Questa risorsa è l\'unica che non segue le regole delle altre risorse.<br>I tre parametri comuni (_quantity, _locale, _seed) hanno lo stesso utilizzo delle altre risorse ma la request di questa risorsa deve essere gestita in modo diverso.
                </p>
                <p>
                    Le chiamate a questa risorsa accettano dei parametri custom secondo uno schema:
                </p>
                <pre><code class="html"><i>myCustomName1</i>=<b>customType1</b>&<i>myCustomName2</i>=<b>customType2</b><br></code></pre>
                <p>
                    dove <i>myCustomName1</i> e <i>myCustomName2</i> sono i nomi che voglio dare ai parametri della mia risorsa custom, e <b>customType1</b> e <b>customType2</b> sono uno dei tipi di parametro accettati elencati qui sotto.
                </p>
                <p>
                    Essa consente di costruire una propria risorsa ad hoc usando i tipi di parametro qui elencati:
                </p>',
            'custom_see' => 'Vedi '
        ]
    ]
];
