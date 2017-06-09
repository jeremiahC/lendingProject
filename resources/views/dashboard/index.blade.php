@extends('layout')

@section('content')

    <div class="row">
        <div class="col s12 m6 l3">
            <div class="card  waves-effect waves-light waves-block red">
                <div class="card-content center-align white-text">
                    <span>Total Customers</span>
                    <h4><i class="material-icons">perm_identity</i><span class="count">{{$customers}}</span></h4>
                </div>
                <div class="card-action  red darken-3">
                    <a href="/customerPage"class="white-text waves-effect waves-light">
                        Go to List
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card waves-effect waves-light waves-block light-blue">
                <div class="card-content center-align white-text">
                    <span>Total Loans</span>
                    <h4><i class="material-icons">list</i><span class="count">{{$totalLoans}}</span></h4>
                </div>
                <div class="card-action  light-blue darken-3 ">
                    <a href="/loanPage"class="white-text waves-effect waves-light">Go To List</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card waves-effect waves-light waves-block light-green">
                <div class="card-content center-align white-text">
                    <span>Total Approved Loans</span>
                    <h4><i class="material-icons">list</i><span class="count">{{$amountAppr}}</span></h4>
                </div>
                <div class="card-action light-green darken-3">
                    <a href="/loanPage"class="white-text">Go To List</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card waves-effect waves-light waves-block yellow">
                <div class="card-content center-align white-text">
                    <span>Total Loans For Approval</span>
                    <h4><i class="material-icons">list</i><span class="count">{{$amount}}</span></h4>

                </div>
                <div class="card-action yellow darken-3">
                    <a href="/loanPage"class="white-text">Go To List</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card waves-effect waves-light waves-block teal">
                <div class="card-content center-align white-text">
                    <span>Total Amount of Approved Loans</span>
                    <h2>&#8369;{{$totalLoanAmt}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card lighten-1">
                <div class="card-image waves-effect waves-block waves-light">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="card-content">
                    <span class="card-title activator white-text">Card Title<i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-reveal teal lighten-1">
                    <span class="card-title white-text">Card Title<i class="material-icons right">close</i></span>
                    <p class="white-text">Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
        </div>


    </div>

@endsection

@section('script')
    <script>
        $('.count').each(function () {
            var totalNum = $(this).text();
            console.log(totalNum);
            $(this).animationCounter({
                start: 0,
                end: totalNum,
                step: 1,
                delay: 10
            });
        })


        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        data: [65, 59, 80, 81, 56, 55, 40],
                    }]
            },
            options: {
                animation:{
                    animateScale:true
                }
            }
        });
    </script>
@endsection