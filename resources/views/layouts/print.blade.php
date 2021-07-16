<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css"  crossorigin="anonymous">
<style>
    @media print {
        .nopagebreak {page-break-inside: avoid;}
    }
    .flex-container {
        display: flex;
        flex-wrap: wrap;
        align-content: flex-start;
    }
    .flex-item {
        flex: 0 0 50px;
        margin: 5px;
    }
    .flex-item:last-child {
        align-self: flex-end;
    }
    .centertext{
        text-align: center;
    }
</style>
</head>
<body>

            @yield('content')



</body>
</html>


