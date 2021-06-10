@extends('layout')

@section('meta')
    <title>Faker Api - Generate Fake data by API requests</title>
    <meta name="description" content="Generate fake data and get by REST API requests.">
    <meta name="keywords" content="faker,api,fake data,fake data api,faker api">
@endsection

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
            <a class="nav-link" href="/{{ app()->getLocale() }}/fake-data-download">Fake data Download</a>
        </li>
    </ul>
@endsection

@section('content')
    <section id="what">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 d-none d-md-flex">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Verticale sx -->
                    <ins class="adsbygoogle"
                        style="display:block; width: 100%;"
                        data-ad-client="ca-pub-2938320348991141"
                        data-ad-slot="3635890192"
                        data-ad-format="auto"
                        data-adtest="{{ (app()->environment('local')) ? 'true' : 'false' }}"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="col-md-8 mt-5">
                    <h2 class="text-center">
                        What's Faker API?
                    </h2>
                    <div class="text-center my-3">
                        <img src="/assets/img/symbol.png" style="width: 100px;" alt="">
                    </div>
                    <div class="text-center my-3 py-3">
                        {!! trans('home.what.main') !!}
                    </div>
                    <div class="text-center my-3 py-3">
                        <p class="h5">
                            {{ trans('home.what.current') }} <a href="javascript:scrollTo('changelogs')" class="h4">{{ config('api.current_version') }}</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-2 d-none d-md-flex">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Verticale dx -->
                    <ins class="adsbygoogle"
                        style="display:block; width: 100%;"
                        data-ad-client="ca-pub-2938320348991141"
                        data-ad-slot="3791996388"
                        data-ad-format="auto"
                        data-adtest="{{ (app()->environment('local')) ? 'true' : 'false' }}"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
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

        $('.collapse').on('shown.bs.collapse', function (e) {
            var $panel = $(this).closest('.card');
            $('html,body').animate({
                scrollTop: $panel.offset().top - 100
            }, 500);
        });

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
