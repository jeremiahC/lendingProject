<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="/css/materialize.css" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <script src="/js/jquery.min.js"></script>
        <script src="/js/materialize.js"></script>

    </head>
    <body>
        {{--navbar part--}}
        @include('template.navbar')

        {{--sidebar part--}}
        @include('template.sidebar')

        {{--content part--}}
        <main>
            @yield('content')
        </main>
        {{--footer part--}}
        @include('template.footer')


    </body>
</html>
