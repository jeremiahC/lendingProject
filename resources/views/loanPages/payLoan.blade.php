@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l12">
            <h4>Pay Loan</h4>
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <input type="text" class="validate" id="fname">
                                <label for="fname">customer's name</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <input type="text" class="validate" id="fname">
                                <label for="fname">Amount</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <input type="text" class="validate" id="fname">
                                <label for="fname">Payment for</label>
                            </div>

                            <div class="input-field col s12 m12 l12">
                                <div class="row">
                                    <div class="col s5 m5 l5">
                                        <label>Mode for Payemnt</label>
                                    </div>
                                    <div class="col s m5 l5">
                                        <input type="radio" id="cash" name="mode">
                                        <label for="cash">Cash</label>
                                        <input type="radio" id="check" name="mode">
                                        <label for="check">Check</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <a href="#" class="btn right">Pay</a>
                </div>
                <div class="col s12 m12 l5">
                    <a href="#" class="btn col s12">Print View</a>
                </div>
            </div>
        </div>

    </div>
@endsection
