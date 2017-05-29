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
                <li class="tab col s3"><a class="active" href="#test1">Ledger</a></li>
                <li class="tab col s3"><a href="#test2">Statistics</a></li>
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
                        <h3>100</h3>
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

    </div>
    <div class="fixed-action-btn click-to-toggle">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">assignment</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating green" href="/customerPage/customer{{$customer->id}}/addLoan">
                    <i class="material-icons">add</i>
                </a>
            </li>
        </ul>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {



            var addLoan = $('#addLoan').text();
            var interest = $('#interest').text();

            $('.loan_hide').hide();

            $('#intrt').click(function () {
                var txt = "";
                $.ajax({
                    url: '/customerPage/customer'+ {{$customer->id}} +'/generateIntrst',
                    success: function(data){
                        console.log(data);
                        txt += "<tr>";
                        txt += "<td>" + data.date+ "</td>";
                        txt += "<td>" + data.transaction + "</td>";
                        txt += "<td></td>";
                        txt += "<td></td>";
                        txt += "<td>" + data.interest  + "</td>";
                        txt += "<td></td>";
                        txt += "<td>" + data.balance + "</td>";
                        txt += "<td></td>";
                        txt += "</tr>";

                        $('#ledger').append(txt);
                    },
                    error: function(data){
                        console.log(data);
                    }

                });
            });

            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bubble',
                data: {
                    datasets: [
                        {
                            label: 'First Dataset',
                            data: [
                                {
                                    x: 20,
                                    y: 30,
                                    r: 15
                                },
                                {
                                    x: 40,
                                    y: 10,
                                    r: 10
                                }
                            ],
                            backgroundColor:"#FF6384",
                            hoverBackgroundColor: "#FF6384",
                        }]
                },
                options: {
                    animation:{
                        animateScale:true
                    }
                }
            });
        });
    </script>
@endsection