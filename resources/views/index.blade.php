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
                <div class="col-md-2 d-md-flex d-none justify-content-center py-4">
                    <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=14&l=ur1&category=prime_video&banner=1X33YCKXFGN8ZKYAAWR2&f=ifr&linkID=ebef1f6011effbe6fbcf8e408acdde4e&t=pietrantonio-21&tracking_id=pietrantonio-21" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
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
                <div class="col-md-2 d-md-flex d-none justify-content-center py-4">
                    <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=14&l=ur1&category=prime_video&banner=1X33YCKXFGN8ZKYAAWR2&f=ifr&linkID=ebef1f6011effbe6fbcf8e408acdde4e&t=pietrantonio-21&tracking_id=pietrantonio-21" width="160" height="600" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </section>
    <svg class="section-diag-grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
        <polygon points="0 0 100 10 0 10" />
    </svg>
    <section id="docs" class="background-grey">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <iframe src="https://rcm-eu.amazon-adsystem.com/e/cm?o=29&p=48&l=ur1&category=primeday2021&banner=0PWY2M9AXPWGQ1GCC002&f=ifr&linkID=dd811a9ddce9b74bfade1fd5766317ab&t=pietrantonio-21&tracking_id=pietrantonio-21" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
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
