@extends('layout')

@section('content')
    @include('customerPage.profile')
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
                <div class="card">
                    <canvas id="myChart" height="50" width="100"></canvas>
                </div>
           </div>
        </div>
        <div id="test3" class="col s12 m11 l11">
           archive
        </div>
        <div id="test4" class="col s12 m11 l11">
            @if($customer->invledger->count() > 0)
                <div class="card">
                    <div class="card-content">
                        @include('customerPage.ledgers.investments')
                    </div>
                </div>
                @include('customerPage.ledgers.invoptions')
            @else
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content center-align">No Investments</div>
                        </div>
                    </div>
                </div>
            @endif
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
            <li>
                <a class="btn-floating red" id="delete">
                    <i class="material-icons">delete</i>
                </a>
            </li>
        </ul>
    </div>
    <input type="text" value="{{$customer->id}}" id="customer_id" hidden>
@endsection

@section('script')
    <script src="/js/script.js"></script>
@endsection