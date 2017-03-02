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
                        <th data-field="id">Date</th>
                        <th data-field="name">Transaction</th>
                        <th data-field="price">Add Loan</th>
                        <th data-field="price">Amount</th>
                        <th data-field="price">Interest</th>
                        <th data-field="price">Payments</th>
                        <th data-field="price">Balance</th>
                        <th data-field="price">Received</th>
                        <th data-field="price">Approved</th>
                        <th data-field="price">Date-time</th>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="right">
                <div class="fixed-action-btn horizontal click-to-toggle">
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