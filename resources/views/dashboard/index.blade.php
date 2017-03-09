@extends('layout')

@section('content')

    <div class="row">
        <div class="col s12 m12 l11">
            <ul class="collection with-header">
                <li class="collection-header "><h4>Pending Loans</h4></li>
                <li class="collection-item avatar">
                    <img src="images/profile.png" alt="" class="circle">
                    <span class="title">Jeremiah Caballero</span>
                    <div class="chip red white-text">
                        Not yet Approved
                    </div>
                    <p>
                        November 16, 2017
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">more_horiz</i></a>
                </li>
                <li class="collection-item avatar">
                    <img src="images/profile.png" alt="" class="circle">
                    <span class="title">Mario Quijads</span>
                    <div class="chip red white-text">
                        Not yet Approved
                    </div>
                    <p>
                        November 16, 2017
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">more_horiz</i></a>
                </li>
                <li class="collection-item avatar">
                    <img src="images/profile.png" alt="" class="circle">
                    <span class="title">John Doe</span>
                    <div class="chip red white-text">
                        Not yet Approved
                    </div>
                    <p>
                        November 16, 2017
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">more_horiz</i></a>
                </li>
                <li class="collection-item avatar">
                    <img src="images/profile.png" alt="" class="circle">
                    <span class="title">Chevy Banico</span>
                    <div class="chip red white-text">
                        Not yet Approved
                    </div>
                    <p>
                        November 16, 2017
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">more_horiz</i></a>
                </li>

            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6 l6">
            <div class="card pink lighten-1">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/background.jpg">
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
            <div class="card-panel red">
                <i class="material-icons large white-text">face</i>
                <span class="white-text">100</span>
                <i class="material-icons right white-text">more_vert</i>
            </div>
        </div>
    </div>

@endsection

