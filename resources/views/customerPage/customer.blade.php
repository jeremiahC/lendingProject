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
                    @role('REG-EMPLOYEE')
                        <a href="/customerPage/customer{{$customer->id}}/edit" class="btn-floating halfway-fab waves-effect waves-light red" id="editBtn"><i class="material-icons">edit</i></a>
                    @endrole
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m11 l11">
            <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#test1">Loans</a></li>
                <li class="tab col s3"><a href="#test4">Investments</a></li>
                <li class="tab col s3"><a href="#test2">Insights</a></li>
                <li class="tab col s3"><a href="#test3">Archives</a></li>
            </ul>
        </div>
        <div id="test1" class="col s12">

            @if($customer->ledger->count() > 0)
                @foreach($customer->loan as $loans)
                    @if($loans->short_term === "yes")
                        @include('customerPage.ledgers.short')
                    @else
                        @include('customerPage.ledgers.long')
                    @endif
                @endforeach
            @else
                <div class="row">
                    <div class="col s12 m11 l11">
                        <div class="card">
                            <div class="card-content center-align">No Ledger</div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div id="test2" class="col s12 m11 l11">
            <div class="row">
                <div class="card red">
                    <div class="card-content white-text center-align">
                        <span>Total Loans</span>
                        <h3>{{$customer->loans->count()}}</h3>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="card">
                    <canvas id="myChart" height="50" width="100"></canvas>
                </div>
           </div>
        </div>
        <div id="test3" class="col s12 m11 l11">
           archive
        </div>
        <div id="test4" class="col s12 m11 l11">
            <div class="card">
                <div class="card-content">
                    @include('customerPage.ledgers.investments')
                </div>
                @include('customerPage.ledgers.invoptions')
            </div>
        </div>

    </div>
    <div class="fixed-action-btn click-to-toggle">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating green" href="/investments/add/customer{{$customer->id}}">
                    <i class="material-icons">attach_money</i>
                </a>
            </li>
            <li>
                <a class="btn-floating blue-grey" href="/customerPage/customer{{$customer->id}}/addLoan">
                    <i class="material-icons">assignment</i>
                </a>
            </li>
        </ul>
    </div>
    <input type="text" value="{{$customer->id}}" id="customer_id" hidden>
@endsection

@section('script')
    <script src="/js/script.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();

            var CSRF_TOKEN = $('input[name="_token"]').val();
            $('#widthrawBtn').click(function (e) {
                e.preventDefault();

                var txt = "";
                $.ajax({
                    url: '/withdraw',
                    type: 'post',
                    data:{
                        '_token'     : CSRF_TOKEN,
                        'balance': $('#invbalance').val(),
                        'amount' : $('#invamount').val(),
                        'customer_id': $('#customer_id').val()
                    },
                    success: function (data) {
                        console.log(data+'success');
                        txt += "<tr>";
                        txt += "<td></td>";
                        txt += "<td>" + data.transaction + "</td>";
                        txt += "<td>" + data.withdraw + "</td>";
                        txt += "<td></td>";
                        txt += "<td></td>";
                        txt += "<td>" + data.balance + "</td>";
                        txt += "<td></td>";
                        txt += "</tr>";

                        $('#invledger').append(txt);
                    },
                    error: function (data) {
                        console.log(data + 'error');
                    }
                });
            });
        });
    </script>
@endsection