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
                            @foreach($customers as $customer)
                                <tr>
                                    <td class="name">{{$customer->lname.", ".$customer->fname." ".substr($customer->mname,-6,1)}}.</td>
                                    <td>Cebu</td>
                                    <td>74,200</td>
                                    <td><a href="/customerPage/customer{{$customer->id}}" class="btn waves-effect waves-light green">view</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="btn-large waves-effect waves-light right blue" href="/customerPage/create">New Customer</a>
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
    </script>
@endsection