@extends('layout')

@section('content')
    <div class="row">
        <h3>Customer's List</h3>
        <div class="col s12 m12 l11 " id="users">
                <div class="col s12 m12 l5 right">
                    <form>
                        <div class="input-field">
                            <input id="search" class="search" type="search" placeholder="search for names...">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        </div>
                    </form>
                </div>

                <div  class="card-panel">
                    <table class="responsive-table striped black-text">
                        <thead class="green">
                        <tr>
                            <th data-field="id" class="t-heads">
                                Name
                                <i class="material-icons right icon-hover sort" data-sort="name">sort_by_alpha</i>
                            </th>
                            <th data-field="name" class="t-heads">Category</th>
                            <th data-field="price" class="t-heads">Balance</th>
                            <th data-field="action" class="t-heads">Action</th>
                        </tr>
                        </thead>

                        <tbody class="list">

                            <tr>
                                <td class="name">Alvin</td>
                                <td class="city">Cebu</td>
                                <td>74,200</td>
                                <td><a href="/customerPage/customer" class="btn waves-effect waves-light green">view</a></td>
                            </tr>

                            <tr>
                                <td class="name">Bob</td>
                                <td class="city">Talisay</td>
                                <td>74,200</td>
                                <td><a href="/customerPage/customer" class="btn waves-effect waves-light green">view</a></td>
                            </tr>

                            <tr>
                                <td class="name">Carl</td>
                                <td class="city">Naga</td>
                                <td>74,200</td>
                                <td><a href="/customerPage/customer" class="btn waves-effect waves-light green">view</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var options = {
            valueNames: [ 'name', 'city' ]
        };

        var userList = new List('users', options);
    </script>
@endsection