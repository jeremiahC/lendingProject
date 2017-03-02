@extends('layout')

@section('content')

    <div class="row">
        <div class="col s12 m3">
            <div class="card  cyan">
                <div class="card-content white-text">
                    <i class="large material-icons">thumb_up</i>
                    <span class="text">100</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light light-green">
                        <i class="material-icons">visibility</i>
                    </a>
                </div>
                <div class="card-content">
                    <span class="card-title">Pending Loans</span>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card  green lighten-1">
                <div class="card-content white-text">
                    <i class="large material-icons">trending_up</i>
                    <span class="text">100</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light light-green">
                        <i class="material-icons">visibility</i>
                    </a>
                </div>
                <div class="card-content">
                    <span class="card-title">Total Collectibles</span>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card  red lighten-1">
                <div class="card-content white-text">
                    <i class="large material-icons">info</i>
                    <span class="text">100</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light light-green">
                        <i class="material-icons">visibility</i>
                    </a>
                </div>
                <div class="card-content">
                    <span class="card-title">Business Information</span>
                </div>
            </div>
        </div>
        <div class="col s12 m3">
            <div class="card  yellow lighten-1">
                <div class="card-content white-text">
                    <i class="large material-icons">perm_identity</i>
                    <span class="text">100</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light light-green">
                        <i class="material-icons">visibility</i>
                    </a>
                </div>
                <div class="card-content">
                    <span class="card-title">Customers</span>
                </div>
            </div>
        </div>
    </div>

@endsection

