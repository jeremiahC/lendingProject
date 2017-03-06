<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lending Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="/css/materialize.css" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">

        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/js/list.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

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

        @yield('script')

        <script>
            $("#button").sideNav();
        </script>

    </body>




</html>
