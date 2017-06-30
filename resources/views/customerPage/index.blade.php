@extends('layout')

@section('content')
    <div class="row"  id="users">
        <h3>Customer's List</h3>
        <div class="col s12 m12 l11">
            <form>
                <div class="input-field card" id="search-bar">
                    <input class="search" type="search" placeholder="search for names...">
                    <i class="material-icons white-text light-green">search</i>
                </div>
            </form>
        </div>
        <div class="col s12 m12 l11 ">

            @if(count($customers) > 0)
                <div  class="card-panel articles">
                    @include('customerPage.list')
                </div>
            @endif
                @ability('REG-EMPLOYEE', 'add_customer')
                    <a class="btn-large waves-effect waves-light right blue" href="/customerPage/create">New Customer</a>
                @endability
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

        var options = {
            valueNames: [ 'name' ]
        };

        var userList = new List('users', options);

        //pagination
        $(document).ready(function () {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.articles').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }
        });
    </script>
@endsection