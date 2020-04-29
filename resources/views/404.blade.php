@extends('layout')

@section('meta')
    <title>Faker Api - 404 - not found</title>
    <meta name="description" content="Generate fake data and get by REST API requests.">
    <meta name="keywords" content="faker,api,fake data,fake data api,faker api">
@endsection

@section('navbar-nav')
    @parent
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/#docs">Docs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/#test">Test</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/#changelogs">Changelogs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/{{ app()->getLocale() }}/fake-data-download">Fake data Download</a>
        </li>
    </ul>
@endsection

@section('content')
    <section id="what">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 mt-5">
                    <h2 class="text-center">
                        404 - not found
                    </h2>
                    <div class="text-center my-3">
                        <img src="/assets/img/symbol.png" style="width: 100px;" alt="">
                    </div>
                    <div class="text-center my-3 py-3">
                        Sorry, the page you are looking for was not found.
                    </div>
                    <div class="text-center my-3 py-3">
                        <a class="btn btn-gradient" href="/">Back home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
