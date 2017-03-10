@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m12 l6">
                        <div class="input-field col s10">
                            <input placeholder="Amount Approved" id="amount" type="text" class="validate">
                            <label for="amount">Amount</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Less" id="less" type="text" class="validate">
                            <label for="less">Less</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="interest" type="text" class="validate">
                            <label for="interest">Interest</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="interest" type="text" class="validate">
                            <label for="interest">Service Charge </label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="interest" type="text" class="validate">
                            <label for="interest">Attty./Notarial Fee</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="interest" type="text" class="validate">
                            <label for="interest">Previoys Loan</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="interest" type="text" class="validate">
                            <label for="interest">Others</label>
                        </div>

                        <div class="input-field col s10">
                            <input placeholder="Net amount Recieved" id="amount" type="text" class="validate">
                            <label for="amount">Total</label>
                        </div>


                    </div>
                </div>
                <div class="right">
                    <button class=" btn waves-effect waves-light red" >Disapprove
                        <i class="material-icons right">thumb_down</i>
                    </button>
                    <button class=" btn waves-effect waves-light blue" id="click" type="button">Approve
                        <i class="material-icons right">thumb_up</i>
                    </button>
                </div>
            </div>
        </div>
        @endsection

        @section('script')
            <script>
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15 // Creates a dropdown of 15 years to control year
                });
            </script>
@endsection