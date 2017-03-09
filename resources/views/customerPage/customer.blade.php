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
                            Jeremiah Caballero
                        </div>
                        <div class="col s12 l7">
                            <b>Birthday:</b>
                            November 16,1996
                        </div>
                        <div class="col s12 l7">
                            <b>Cellphone No.:</b>
                            09152480538
                        </div>
                        <div class="col s12 l7">
                            <b>Home Address:</b>
                            Lawaan, Talisay City, Cebu
                        </div>
                        <div class="col s12 l7">
                            <b>Company Address:</b>
                            None
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