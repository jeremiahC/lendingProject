@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="/images/background.jpg" width="300" height="300">
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 l7">
                            <b>Full Name:</b>
                            {{$customer_id->fname. " " .substr($customer_id->mname,-6,1).". ".$customer_id->lname}}
                        </div>
                        <div class="col s12 l7">
                            <b>Birthday:</b>
                            {{$customer_id->birthday}}
                        </div>
                        <div class="col s12 l7">
                            <b>Cellphone No.:</b>
                            +63{{$customer_id->cell_no}}
                        </div>
                        <div class="col s12 l7">
                            <b>Home Address:</b>
                            {{$customer_id->home_add}}
                        </div>
                        <div class="col s12 l7">
                            <b>Company Address:</b>
                            {{$customer_id->comp_add}}
                        </div>
                    </div>

                    <a href="/customerPage/edit" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>

                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col s12 m12 l11">
            <h4>Ledger</h4>
            <div class="card-panel">
                <table class="striped responsive-table">
                    <thead>
                    <tr>
                        <th data-field="id" class="center-align">Date</th>
                        <th data-field="name" class="center-align">Transaction</th>
                        <th data-field="price" class="center-align">Add Loan</th>
                        <th data-field="price" class="center-align">Amount</th>
                        <th data-field="price" class="center-align">Interest</th>
                        <th data-field="price" class="center-align">Payments</th>
                        <th data-field="price" class="center-align">Balance</th>
                        <th data-field="price" class="center-align">Received</th>
                        <th data-field="price" class="center-align">Approved</th>
                        <th data-field="price" class="center-align">Date-time</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>January 15</td>
                        <td>Loan</td>
                        <td></td>
                        <td>100,000</td>
                        <td>2.5% / 15days</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>January 1, 2017</td>
                    </tr>
                    <tr>
                        <td>January 15</td>
                        <td>Loan</td>
                        <td></td>
                        <td>100,000</td>
                        <td>2.5% / 15days</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>January 1, 2017</td>
                    </tr>
                    <tr>
                        <td>January 15</td>
                        <td>Loan</td>
                        <td></td>
                        <td>100,000</td>
                        <td>2.5% / 15days</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>January 1, 2017</td>
                    </tr>
                    </tbody>
                </table>


            </div>
            <div class="right">
                <a href="/customerPage/customer{{$customer_id->id}}/addLoan" class="btn waves-effect waves-light blue"><i class="left material-icons">add</i>Add Loan</a>
                <a href="#" class=" btn waves-effect waves-light grey">
                    <i class="material-icons left">import_export</i>Export file
                </a>

                <a href="#" class=" btn waves-effect waves-light grey">
                    <i class="material-icons left">print</i>Print
                </a>
            </div>
        </div>

    </div>


@endsection