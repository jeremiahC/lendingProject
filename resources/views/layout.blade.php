<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    @include('template.header')
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

    </body>




</html>
