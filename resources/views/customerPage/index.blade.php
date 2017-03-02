@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l11">
            <nav>
                <div class="nav-wrapper white">
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
            <div class="card-panel light-green lighten-1">

                <table class="responsive-table black-text">
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