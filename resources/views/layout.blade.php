<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lending Project</title>
        <link rel="shortcut icon" href="/images/logo.png" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" type="text/css">
        <link href="/css/materialize.css" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">

        <script src="/js/app.js"></script>
        <script src="/js/list.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

        <style>
            span.error{
               color: red;
            }
        </style>
    </head>
    <body>
        @if (Auth::guest())
            @include('auth.login')
        @else
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


            <script>
                $("#button").sideNav();
            </script>

            @yield('script')
        @endif
    </body>




</html>
