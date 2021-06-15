<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('meta')

    <meta name="author" content="Alessandro Pietrantonio">

    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png" />

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    {{-- Highlight js --}}
    <link rel="stylesheet" href="{{\URL::to('/')}}/assets/css/agate.css">
    <link rel="stylesheet" href="{{\URL::to('/')}}/assets/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163807379-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163807379-1', {'anonymize_ip': true});
    </script>

</head>

<body>

    @include('parts.header')

    @yield('content')

    @include('parts.footer')

    <script src="{{\URL::to('/')}}/assets/js/jquery-3.4.1.min.js" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script> --}}
    <script src="/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="{{\URL::to('/')}}/assets/js/highlight.pack.js"></script>
    <script>
        const BASE_URL = '{{\URL::to('/')}}';
    </script>
    <script src="{{\URL::to('/')}}/assets/js/requests.js"></script>
    @if(app()->environment() == 'local')
        <script src="{{\URL::to('/')}}/assets/js/vue.js"></script>
    @else
        <script src="{{\URL::to('/')}}/assets/js/vue.min.js"></script>
    @endif
    @yield('footerscripts')
</body>

</html>
