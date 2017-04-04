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
        {{--navbar part--}}
        @include('template.navbar')

        {{--sidebar part--}}
        @include('template.sidebar')

        {{--content part--}}
        <main>
            @yield('content')
        </main>

        <div class="fixed-action-btn click-to-toggle">
            <a class="btn-floating btn-large red">
                <i class="material-icons">menu</i>
            </a>
            <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
            </ul>
        </div>


        {{--footer part--}}
        @include('template.footer')


        <script>
            $("#button").sideNav();
        </script>

        @yield('script')
    </body>




</html>
