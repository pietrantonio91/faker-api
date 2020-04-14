<div class="row">
    <div class="col mt-5">
        <h2 class="text-center">
            Docs
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-12 mt-5">
        <p>
            Non è richiesta nessuna chiave o token per l’utilizzo di Faker API. È un servizio gratuito e assolutamente
            open-source.
        </p>
        <p>
            <strong>Postman:</strong><br>
            Scarica la collection di Postman (versione 2.1)<br>
            <a href="/Faker API.postman_collection.json" class="btn btn-postman mt-3" download><svg class="i-import" viewBox="0 0 32 32" width="24" height="24" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M28 22 L28 30 4 30 4 22 M16 4 L16 24 M8 16 L16 24 24 16"></path>
            </svg> Download Postman Collection</a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-12 mt-5">
        <h4>
            <span class="color-gradient">Base URL</span>
        </h4>
        <p>
            <pre><code class="html">{{\URL::to('/')}}/api/v1/{resource}</code></pre>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-12 mt-5">
        <h4>
            <span class="color-gradient">Basic Usage</span>
        </h4>
        <p>
            Alcune risorse permettono di filtrare i risultati in base ai parametri GET che vengono passati.<br>
            I nomi di questi parametri sono sempre preceduti da un underscore "_", ad esempio:
            <pre><code class="html">{{\URL::to('/')}}/api/v1/images?_width=380</code></pre>
        </p>
        <p>
            I dati sono sempre wrappati dentro a "data" e sono sempre accompagnati dal numero totale ("total") e dal codice Http della response.
        </p>
        <p>
            Tutte le risorse accettano 3 parametri GET comuni:
        </p>
        <ul>
            <li><a href="javascript:scrollTo('params_locale')">_locale</a></li>
            <li><a href="javascript:scrollTo('params_quantity')">_quantity</a></li>
            <li><a href="javascript:scrollTo('params_seed')">_seed</a></li>
        </ul>
        <h5 id="params_locale">
            _locale <a href="{{\URL::to('/')}}#params_locale">#</a>
        </h5>
        <p>
            Default: en_US
        </p>
        <p>
            Il parametro indica la localizzazione dei risultati che si vogliono ottenere e accetta il formato di tipo
            “it_IT”. Esempio:
        </p>
        <pre><code class="html">{{\URL::to('/')}}/api/v1/persons?_locale=fr_FR</code></pre>
        <p>
            Questo esempio restituisce delle persone con nomi appartenenti alla lingua francese.
        </p>
        <h5 id="params_quantity">
            _quantity <a href="{{\URL::to('/')}}#params_quantity">#</a>
        </h5>
        <p>
            Default: 10
        </p>
        <p>
            Max: 1000
        </p>
        <p>
            Il parametro indica la quantità di risultati che si vogliono ottenere e accetta solo numeri interi. Se si
            richiedono più di 1000 risultati il sistema restituisce comunque 1000 risultati. Esempio:
        </p>
        <pre><code class="html">{{\URL::to('/')}}/api/v1/companies?_quantity=5</code></pre>
        <p>
            Questo esempio restituisce 5 aziende.
        </p>
        <h5 id="params_seed">
            _seed <a href="{{\URL::to('/')}}#params_seed">#</a>
        </h5>
        <p>
            Default: null
        </p>
        <p>
            Il parametro accetta un numero intero e consente di ottenere più volte gli stessi risultati. Quindi
            eseguendo la stessa richiesta con il parametro _seed valorizzato con un numero (es. 12456) i risultati non
            cambieranno mai. Esempio:
        </p>
        <pre><code class="html">{{\URL::to('/')}}/api/v1/companies?_seed=8665</code></pre>
    </div>
</div>
<div class="row">
    <div class="col-12 mt-5">
        <h4>
            <span class="color-gradient">Resources</span>
        </h4>
    </div>
</div>
<div class="row">
    <div class="col-12 mt-2">
        <div class="accordion" id="accordionDocs">
            <div class="card">
                <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#addresses"
                    aria-expanded="false" aria-controls="addresses">
                    <h4 class="mb-0">
                        Addresses
                    </h4>

                </div>

                <div id="addresses" class="collapse" aria-labelledby="headingOne" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/addresses?_quantity=1</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/addresses?_quantity=1', 'addresses')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingTwo" data-toggle="collapse" data-target="#books"
                    aria-expanded="false" aria-controls="books">
                    <h4 class="mb-0">
                        Books
                    </h4>
                </div>
                <div id="books" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/books?_quantity=1</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/books?_quantity=1', 'books')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#companies"
                    aria-expanded="false" aria-controls="companies">
                    <h4 class="mb-0">
                        Companies
                    </h4>
                </div>
                <div id="companies" class="collapse" aria-labelledby="headingThree" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/companies?_quantity=1</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/companies?_quantity=1', 'companies')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingFour" data-toggle="collapse" data-target="#credit_cards"
                    aria-expanded="false" aria-controls="credit_cards">
                    <h4 class="mb-0">
                        Credit Cards
                    </h4>
                </div>
                <div id="credit_cards" class="collapse" aria-labelledby="headingFour" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/credit_cards?_quantity=1</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/credit_cards?_quantity=1', 'credit_cards')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingSix" data-toggle="collapse" data-target="#images"
                    aria-expanded="false" aria-controls="images">
                    <h4 class="mb-0">
                        Images
                    </h4>
                </div>
                <div id="images" class="collapse" aria-labelledby="headingSix" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Additional optional parameters:
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Description</th>
                                        <th>Example</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>_type</td>
                                        <td>
                                            any, animals, architecture, nature, people, tech, kittens
                                        </td>
                                        <td>
                                            <pre>_type=architecture</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>_width</td>
                                        <td>
                                            pixels (default: 640)
                                        </td>
                                        <td>
                                            <pre>_width=500</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>_height</td>
                                        <td>
                                            pixels (default: 480)
                                        </td>
                                        <td>
                                            <pre>_height=230</pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/images?_quantity=1&_type=kittens&_height=300</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/images?_quantity=1&_type=kittens&_height=300', 'images')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingSeven" data-toggle="collapse" data-target="#persons"
                    aria-expanded="false" aria-controls="persons">
                    <h4 class="mb-0">
                        Persons
                    </h4>
                </div>
                <div id="persons" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Additional optional parameters:
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Description</th>
                                        <th>Example</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>_gender</td>
                                        <td>
                                            male, female
                                        </td>
                                        <td>
                                            <pre>_gender=female</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>_birthday_start</td>
                                        <td>
                                            date in format Y-m-d (default: -90 years)
                                        </td>
                                        <td>
                                            <pre>_birthday_start=1994-02-09</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>_birthday_end</td>
                                        <td>
                                            date in format Y-m-d (default: now)
                                        </td>
                                        <td>
                                            <pre>_birthday_end=2018-10-09</pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/persons?_quantity=1&_gender=male&_birthday_start=2005-01-01</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/persons?_quantity=1&_gender=male&_birthday_start=2005-01-01', 'persons')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingEight" data-toggle="collapse" data-target="#places"
                    aria-expanded="false" aria-controls="places">
                    <h4 class="mb-0">
                        Places
                    </h4>
                </div>
                <div id="places" class="collapse" aria-labelledby="headingEight" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/places?_quantity=1</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/places?_quantity=1', 'places')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingNine" data-toggle="collapse" data-target="#products"
                    aria-expanded="false" aria-controls="products">
                    <h4 class="mb-0">
                        Products
                    </h4>
                </div>
                <div id="products" class="collapse" aria-labelledby="headingNine" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Additional optional parameters:
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Description</th>
                                        <th>Example</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>_price_min</td>
                                        <td>
                                            number in format 10.35 (default: 0.01)
                                        </td>
                                        <td>
                                            <pre>_price_min=20.50</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>_price_max</td>
                                        <td>
                                            number in format 10.35 (default: none)
                                        </td>
                                        <td>
                                            <pre>_price_max=10320.99</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>_taxes</td>
                                        <td>
                                            percentage (default: 22)
                                        </td>
                                        <td>
                                            <pre>_taxes=10</pre>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>_categories_type</td>
                                        <td>
                                            integer, string, uuid (default: integer)
                                        </td>
                                        <td>
                                            <pre>_categories_type=uuid</pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/products?_quantity=1&_taxes=12&_categories_type=uuid</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/products?_quantity=1&_taxes=12&_categories_type=uuid', 'products')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingTen" data-toggle="collapse" data-target="#texts"
                    aria-expanded="false" aria-controls="texts">
                    <h4 class="mb-0">
                        Texts
                    </h4>
                </div>
                <div id="texts" class="collapse" aria-labelledby="headingTen" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Additional optional parameters:
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Description</th>
                                        <th>Example</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>_characters</td>
                                        <td>
                                            integer (default: 200)
                                        </td>
                                        <td>
                                            <pre>_characters=350</pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/texts?_quantity=1&_characters=500</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/texts?_quantity=1&_characters=500', 'texts')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingEleven" data-toggle="collapse" data-target="#users"
                    aria-expanded="false" aria-controls="users">
                    <h4 class="mb-0">
                        Users
                    </h4>
                </div>
                <div id="users" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Additional optional parameters:
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Description</th>
                                        <th>Example</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>_gender</td>
                                        <td>
                                            male, female
                                        </td>
                                        <td>
                                            <pre>_gender=female</pre>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>
                            Request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/users?_quantity=1&_gender=male</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/users?_quantity=1&_gender=male', 'users')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header collapsed" id="headingFive" data-toggle="collapse" data-target="#custom"
                    aria-expanded="false" aria-controls="custom">
                    <h4 class="mb-0">
                        Custom
                    </h4>
                </div>
                <div id="custom" class="collapse" aria-labelledby="headingFive" data-parent="#accordionDocs">
                    <div class="card-body">
                        <p>
                            Questa risorsa è l'unica che non segue le regole delle altre risorse.<br>I tre parametri comuni (_quantity, _locale, _seed) hanno lo stesso utilizzo delle altre risorse ma la request di questa risorsa deve essere gestita in modo diverso.
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
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Example</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($types as $type)
                                    <tr>
                                        <td>{!! $type['type'] !!}</td>
                                        <td>{!! json_encode($type['example']) !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p>
                            Custom request:
                        </p>
                        <pre><code class="html">{{\URL::to('/')}}/api/v1/custom?_quantity=1&customfield1=name&customfield2=dateTime&customfield3=phone</code></pre>
                        <p>
                            Response:
                        </p>
                        <pre><code class="json"></code></pre>
                        <button class="refresh-request btn btn-gradient" onclick="getRequest('{{\URL::to('/')}}/api/v1/custom?_quantity=1&customfield1=name&customfield2=dateTime&customfield3=phone', 'custom')"><svg class="i-reload" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M29 16 C29 22 24 29 16 29 8 29 3 22 3 16 3 10 8 3 16 3 21 3 25 6 27 9 M20 10 L27 9 28 2"></path>
                        </svg> Refresh</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
