@extends('layout')

@section('content')
    <div class="row">
        <h3>Customer's List</h3>
        <div class="col s12 m12 l11">
                <div class="col s12 m12 l5 right">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" placeholder="search for names...">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons" id="close">close</i>
                        </div>
                    </form>
                </div>

                <div class="card-panel">

                    <table class="responsive-table striped black-text">
                        <thead>
                        <tr>
                            <th data-field="id">Name</th>
                            <th data-field="name">Category</th>
                            <th data-field="price">Balance</th>
                            <th data-field="action">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @for($i=0;$i<=2;$i++)
                            <tr>
                                <td>Alvin</td>
                                <td>Eclair</td>
                                <td>74,200</td>
                                <td><a href="/customerPage/customer" class="btn waves-effect waves-light green">view</a></td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#search').keyup(function () {
            alert();
        });

        $('#close').click(function(){
            $('#search').val('');
        });
    </script>
@endsection