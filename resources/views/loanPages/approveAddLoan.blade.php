@extends('layout')

@section('content')
    <div class="row" id="for_approver">
        <form class="col s12 m12 l11" method="post" action="/addLoan/storeAmtApp">
            {{csrf_field()}}
            <input type="text" value="{{$id->id}}" name="loan_id" hidden>
            <div class="card-panel">

                <div class="row">
                    <span class="fill-up-require">Fill up the required fields *</span>

                    <div class="col s12 m12 l6">
                        <div class="input-field col s10">
                            <input placeholder="Amount Approved" id="amount" type="text" name="amount" class="validate">
                            <label for="amount">Amount <span class="fill-up-require">*</span></label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Less" id="less" type="text" name="less" class="validate">
                            <label for="less">Less</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="interest" type="text" name="interest" class="validate">
                            <label for="interest">Interest<span class="fill-up-require">*</span></label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="serv_charge" type="text" name="serv_charge" class="validate">
                            <label for="serv_charge">Service Charge </label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="notarial" type="text" name="notarial" class="validate">
                            <label for="notarial">Attty./Notarial Fee</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="prev_loan" type="text" name="prev_loan" class="validate">
                            <label for="prev_loan">Previoys Loan</label>
                        </div>

                        <div class="input-field col s6">
                            <input placeholder="Interest" id="others" type="text" name="others" class="validate">
                            <label for="others">Others</label>
                        </div>
                        @if($id->short_term === "yes")
                        <div class="input-field col s10">
                            <input id="gives" placeholder="asd" type="text" name="gives" class="validate">
                            <label for="gives">Gives</label>
                        </div>
                        @endif
                        <div class="input-field col s10">
                            <input id="date_start" type="date" name="date_start" class="datepicker" required>
                            <label for="date_start">Date Start</label>
                        </div>

                        <div class="input-field col s10">
                            <input placeholder="Net amount Recieved" id="total" type="text" name="total" class="validate">
                            <label for="total">Total</label>
                        </div>


                    </div>
                    <div class="input-field col s12 m12 l4">
                        <input type="text" value="Loan" name="transaction">
                        <label>Materialize Select</label>
                    </div>
                </div>
            </div>
            <div class="right">
                <button class=" btn waves-effect" id="back" type="button">Back
                    <i class="material-icons right">add</i>
                </button>
                <button class=" btn waves-effect" id="click" type="submit">Save
                    <i class="material-icons right">add</i>
                </button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var amount = '';
            var interest = '';
            var months = '{{$id->months_to_pay}}';
            console.log(months);
            $('#amount').keyup(function () {
                amount = $(this).val();
                $('#gives').val(((Number(amount) * Number(interest) / 100) * months + Number(amount)) / (months * 2));
            });

            $('#interest').keyup(function () {
                interest = $(this).val();
                $('#gives').val(((Number(amount) * Number(interest) / 100) * months + Number(amount)) / (months * 2));
            });

            $('select').material_select();

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 200 // Creates a dropdown of 15 years to control year
            });
        });
    </script>
@endsection