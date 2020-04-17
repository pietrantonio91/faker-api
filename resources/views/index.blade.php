@extends('layout')

@section('navbar-nav')
    @parent
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="javascript:scrollTo('docs')">Docs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:scrollTo('test')">Test</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:scrollTo('changelogs')">Changelogs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/fake-data-csv">Fake data CSV</a>
        </li>
    </ul>
@endsection

@section('content')
    <section id="what">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 mt-5">
                    <h2 class="text-center">
                        What's Faker API?
                    </h2>
                    <div class="text-center my-3">
                        <img src="/assets/img/symbol.png" style="width: 100px;" alt="">
                    </div>
                    <div class="text-center my-3 py-3">
                        <p>
                            Faker API è un <strong>servizio API completamente gratuito</strong> che permette di generare <strong>dati fake</strong> in modo semplice e veloce, tutto tramite RESTful APIs. Non richiede nessuna iscrizione né l'utilizzo di token o altri sistemi di autenticazione.
                        </p>
                        <p>
                            Ogni risorsa permette la localizzazione in lingua tramite il parametro "_locale" e consente inoltre di scegliere la quantità di dati da generare tramite il parametro "_quantity", fino a un massimo di <strong>1000 elementi</strong>.
                        </p>
                        <p>
                            Nel paragrafo <a href="javascript:scrollTo('docs')">Documentazione</a> è possibile approfondire ogni risorsa. È inoltre disponibile la <strong>collection di Postman</strong> per poter utilizzare le nostre API tramite il noto client.
                        </p>
                        <p>
                            Al fondo di questa pagina, nella sezione <a href="javascript:scrollTo('test')">Test</a>, sarà invece possibile testare le nostre API tramite un apposito form.
                        </p>
                    </div>
                    <div class="text-center my-3 py-3">
                        <p class="h5">
                            Current version: <a href="javascript:scrollTo('changelogs')" class="h4">{{ config('api.current_version') }}</a>
                        </p>
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
            @include('parts.test')
        </div>
    </section>
    <svg class="section-diag-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
        <polygon points="0 0 100 10 0 10" />
    </svg>
    <section id="changelogs" class="background-grey pb-5">
        <div class="container">
            @include('parts.changelogs')
        </div>
    </section>

    @endsection

    @section('footerscripts')
        @parent
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

@endsection
