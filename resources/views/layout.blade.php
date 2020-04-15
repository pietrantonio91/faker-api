<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faker Api - Fake data CSV, Excel, SQL, JSON</title>
    <meta name="description" content="Generate fake data and get by REST API.">
    <meta name="keywords" content="faker,api,fake data,fake data api,faker api">
    <meta name="author" content="Alessandro Pietrantonio">

    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- Highlight js --}}
    <link rel="stylesheet" href="assets/css/agate.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163807379-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163807379-1');
    </script>

</head>

<body>

    @include('parts.header')

    @yield('content')

    @include('parts.footer')

    <script src="assets/js/jquery-3.4.1.min.js" crossorigin="anonymous">
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
    <script src="assets/js/vue.js"></script>
    @yield('footerscripts')
</body>

</html>
