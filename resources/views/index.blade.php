<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faker Api</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- Highlight js --}}
    <link rel="stylesheet" href="assets/css/agate.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <a class="navbar-brand" href="/">
            @include('parts.logo')
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:scrollTo('what')">What</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:scrollTo('docs')">Docs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:scrollTo('test')">Test</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fake-data-csv">Fake data CSV</a>
                </li>
            </ul>
        </div>
    </nav>
    <section id="what">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 mt-5">
                    <h2 class="text-center">
                        Cos'è Faker API?
                    </h2>
                    <div class="text-center my-3">
                        <img src="/assets/img/symbol.png" style="width: 100px;" alt="">
                    </div>
                    <div class="text-center my-3 py-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, fugit! Voluptatem
                            voluptate magni minus accusantium atque! Illum, earum maiores, animi cumque molestias
                            exercitationem pariatur, aliquid eveniet laborum velit dolore iusto. </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, ullam. Error nihil
                            perspiciatis eligendi ex dolor sint debitis voluptatum? Vero harum quae blanditiis
                            asperiores alias iste repellendus debitis necessitatibus quisquam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <svg class="section-diag-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
        <polygon points="0 0 100 10 0 10" />
    </svg>
    <section id="docs" class="background-grey">
        <div class="container">
            @include('parts.docs')
        </div>
    </section>
    <section class="background-grey" style="height: 100px;">
    </section>
    <svg class="section-diag-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
        <polygon points="0 0 100 0 100 10" />
    </svg>
    <section id="test" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-5">
                    <h2 class="text-center">
                        Test APIs
                    </h2>
                    <div class="text-center my-3">
                        <img src="/assets/img/symbol.png" style="width: 100px;" alt="">
                    </div>
                    <div class="my-3">
                        <label>Resource</label>
                        <select class="form-control" name="resource" id="test_resource">
                            <option value="{{\URL::to('/')}}/api/v1/addresses">Addresses</option>
                            <option value="{{\URL::to('/')}}/api/v1/books">Books</option>
                            <option value="{{\URL::to('/')}}/api/v1/companies">Companies</option>
                            <option value="{{\URL::to('/')}}/api/v1/credit_cards">Credit Cards</option>
                            <option value="{{\URL::to('/')}}/api/v1/images">Images</option>
                            <option value="{{\URL::to('/')}}/api/v1/persons">Persons</option>
                            <option value="{{\URL::to('/')}}/api/v1/places">Places</option>
                            <option value="{{\URL::to('/')}}/api/v1/products">Products</option>
                            <option value="{{\URL::to('/')}}/api/v1/texts">Texts</option>
                            <option value="{{\URL::to('/')}}/api/v1/users">Users</option>
                            <option value="{{\URL::to('/')}}/api/v1/custom">Custom</option>
                        </select>
                    </div>
                    <div class="my-3">
                        <label>Quantity</label>
                        <input type="number" min="1" max="500" class="form-control" id="test_quantity" value="1">
                    </div>
                    <div class="my-3">
                        <label>URL (additional parameters here)</label>
                        <input type="text" class="form-control" id="test_url" value="">
                    </div>
                    <div class="my-3 text-center">
                        <button type="button" class="refresh-request btn btn-gradient" onclick="getRequest($('#test_url').val(), 'test_response')"><svg class="i-lightning" viewBox="0 0 32 32" width="24" height="24" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M18 13 L26 2 8 13 14 19 6 30 24 19 Z"></path>
                        </svg> Send Test Request</button>
                    </div>
                </div>
                <div class="col-12">
                    <div id="test_response" class="my-3">
                        <pre><code class="json">Test Response.</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    Created by Alessandro Pietrantonio - 2020
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="assets/js/highlight.pack.js"></script>
    <script>
        const BASE_URL = '{{\URL::to('/')}}';
    </script>
    <script src="assets/js/requests.js"></script>
    <script>
        hljs.initHighlightingOnLoad();

        function scrollTo(id)
        {
            $('html,body').animate({
                scrollTop: $('#'+id).offset().top - 100
            }, 1000);
        }

        $('#test_resource').change(function(e) {
            changeTestResource()
        });
        $('#test_quantity').change(function(e) {
            changeTestResource()
        });
        $('#test_quantity').on('keyup', function(e) {
            changeTestResource()
        });
        changeTestResource();

        function changeTestResource()
        {
            $('#test_url').val($('#test_resource').val()+'?_quantity='+$('#test_quantity').val());
        }
    </script>
</body>

</html>
