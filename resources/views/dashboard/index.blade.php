@extends('layout')

@section('content')

    <div class="row">
        <div class="col s12 m12 l11">
            <ul class="collection with-header">
                <li class="collection-header "><h4>Pending Loans</h4></li>
                @foreach($loans as $loansShow)
                    @if($loansShow->amount === null || $loansShow->amount->approved === null)
                    <li class="collection-item avatar">
                        <img src="images/profile.png" alt="" class="circle">
                        <span class="title">{{$loansShow->customer->fname . " " . $loansShow->customer->lname}}</span>
                        <div class="chip red white-text">
                            Not yet Approved
                        </div>
                        <p>
                            {{$loansShow->date_prep}}
                        </p>
                        <a href="/show/loan/{{$loansShow->id}}" class="secondary-content"><i class="material-icons">more_horiz</i></a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6 l6">
            <div class="card pink lighten-1">
                <div class="card-image waves-effect waves-block waves-light">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="card-content">
                    <span class="card-title activator white-text">Card Title<i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-reveal pink lighten-1">
                    <span class="card-title white-text">Card Title<i class="material-icons right">close</i></span>
                    <p class="white-text">Here is some more information about this product that is only revealed once clicked on.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m5 l5">
            <div class="card red">
                <div class="card-content">
                    <span class="card-title white-text">Number of Customers<i class="material-icons right">more_vert</i></span>
                    <i class="material-icons large white-text">face</i>
                    <span class="white-text">100</span>
                </div>
            </div>
            <div class="card light-blue">
                <div class="card-content">
                    <span class="card-title white-text">Number of Customers<i class="material-icons right">more_vert</i></span>
                    <i class="material-icons large white-text">face</i>
                    <span class="white-text">100</span>
                </div>
            </div>
            <div class="card light-green">
                <div class="card-content">
                    <span class="card-title white-text">Number of Employees<i class="material-icons right">more_vert</i></span>
                    <i class="material-icons large white-text">face</i>
                    <span class="white-text">100</span>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    "Red",
                    "Blue",
                    "Yellow"
                ],
                datasets: [
                    {
                        data: [300, 50, 100],
                        backgroundColor: [
                            "red",
                            "blue",
                            "#FFCE56"
                        ],
                        hoverBackgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56"
                        ]
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