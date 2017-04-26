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
                            {{$customer->fname. " " .substr($customer->mname,-6,1).". ".$customer->lname}}
                        </div>
                        <div class="col s12 l7">
                            <b>Birthday:</b>
                            {{$customer->birthday}}
                        </div>
                        <div class="col s12 l7">
                            <b>Cellphone No.:</b>
                            +63{{$customer->cell_no}}
                        </div>
                        <div class="col s12 l7">
                            <b>Home Address:</b>
                            {{$customer->home_add}}
                        </div>
                        <div class="col s12 l7">
                            <b>Company Address:</b>
                            {{$customer->comp_add}}
                        </div>
                    </div>

                    <a href="/customerPage/customer{{$customer->id}}/edit" class="btn-floating halfway-fab waves-effect waves-light red" id="editBtn"><i class="material-icons">edit</i></a>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Ledger</span>
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
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($customer->ledger as $myLoans)
                                <tr class="ledger">
                                    <td>{{$myLoans->date}}</td>
                                    <td>{{$myLoans->transaction}}</td>
                                    <td id="addLoan"></td>
                                    <td id="amount">{{$myLoans->amount}}</td>
                                    <td id="interest">{{$myLoans->interest}}</td>
                                    <td id="payment">{{$myLoans->payments}}</td>
                                    <td id="balance">{{$myLoans->balance}}</td>
                                    <td id="received"></td>
                                    <td></td>
                                </tr>

                        @endforeach
                        {{$ledId = $myLoans->id}}
                        </tbody>
                    </table>

                </div>
            </div>
            <button class="btn" id="intrt">Interest</button>
            <div class="right">
                <a class='dropdown-button btn' href='#' id="dropBtn" data-activates='dropdown1'>
                    <i class="material-icons left">list</i>Options
                </a>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li>
                         <a href="/customerPage/customer{{$customer->id}}/addLoan">Add Loan</a>
                    </li>
                    <li>
                        <a href="/customer{{$customer->id}}/loan{{$ledId}}/payLoan">Pay</a>
                    </li>
                </ul>

            </div>
        </div>

    </div>


@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var addLoan = $('#addLoan').text();
            var interest = $('#interest').text();

            $('.loan_hide').hide();

            $('#intrt').click(function () {
                $.ajax({
                    url: '/customerPage/customer'+ {{$customer->id}} +'/generateIntrst',
                    success: function(data){
                        console.log(data);
                    },
                    error: function(data){
                        console.log(data);
                    }

                });
            });

            @if(Auth::user()->role_id === 3)
                $('#editBtn').hide();
                $('#dropBtn').hide();
            @endif
        });
    </script>
@endsection