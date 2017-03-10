@extends('layout')

@section('content')

<div class="row" id="addLoan">
    <div class="col s12 m12 l11">
        <div class="card-panel">
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="input-field">
                        <input id="date_app" type="date" class="datepicker">
                        <label for="date_app">Birthday</label>
                    </div>
                    <div class="input-field">
                        <div class="row">
                            <div class="col s3 m12 l5">
                                <label>Are you an AFP personel?</label>
                            </div>
                            <div class="right col s5 l6">
                                <input type="radio" class="option" id="yes" name="option">
                                <label for="yes">Yes</label>
                                <input type="radio" class="option" id="no" name="option">
                                <label for="no">No</label>
                            </div>
                        </div>
                        <input type="text" id="serial_no" class="validate" disabled>

                    </div>
                    <div class="input-field">
                        <input type="number" id="amt_app" class="validate">
                        <label for="amt_app">Amount applied</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="colat" class="validate">
                        <label for="colat">Colateral offered</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="co_make" class="validate">
                        <label for="co_make">Co-maker(s)</label>
                    </div>
                </div>
                <div class="col s12 m12 l5 right">
                    <div class="input-field">
                        <input type="date" id="date_prep" class="datepicker">
                        <label for="date_prep">Date Prepared</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="prep_by" class="validate">
                        <label for="prep_by">Prepared By</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="right">
            <button class=" btn waves-effect waves-light" >Save
                <i class="material-icons right">add</i>
            </button>
            <button class=" btn waves-effect waves-light" id="next" type="button">Next
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
</div>

@include('loanPages.approveAddLoan')

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
            });

            var form_for_approver = $('#for_approver');
            form_for_approver.hide();
            $('#next').click(function () {
                $('#addLoan').hide();
                $(form_for_approver).show();
            });

            var opt = $('.option:checked').val();
            console.log(opt);
        });

    </script>
@endsection