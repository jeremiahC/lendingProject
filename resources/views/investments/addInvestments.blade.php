@extends('layout')

@section('content')

<div class="row" id="addLoan">
    <form class="col s12 m12 l11" method="post">
        {{csrf_field()}}
        <input type="text" value="{{$customer->id}}" id="customer_id" hidden>
        <div class="card-panel">
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="input-field">
                        <input id="date_app" type="date" class="datepicker" name="date_app">
                        <label for="date_app">Date Applied</label>
                    </div>

                    <div class="input-field">
                        <input type="text" id="amt_app" class="currency" name="amt_app"/>
                        <label for="amt_app">Amount applied</label>
                    </div>
                </div>
                <div class="col s12 m12 l5 right">
                    <div class="input-field">
                        <input type="date" id="date_prep" class="datepicker" name="date_prep">
                        <label for="date_prep">Date Prepared</label>
                    </div>
                    <div class="input-field">
                        <input type="text" value="{{$employee}}" readonly>
                        <input type="text" id="prep_by" name="prep_by" value="{{$employeeId}}" hidden>
                        <label>Prepared By</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <button class=" btn waves-effect waves-light" id="save_loan" type="submit">Save
                <i class="material-icons right">add</i>
            </button>
            <a href="/customerPage/customer{{$customer->id}}/addLoan/amountapprove" class=" btn waves-effect waves-light" id="next" type="button">Next
                <i class="material-icons right">send</i>
            </a>
        </div>
    </form>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $('.currency').maskMoney();

            var short_term = '';
            $('#short_term').change(function () {
                short_term = $(this).val();
            });

            //add loan
            $('#next').hide();

            $('#save_loan').click(function (e) {

                e.preventDefault();
                var CSRF_TOKEN = $('input[name="_token"]').val();
                var customer_id = $('#customer_id').val();

                $.ajax({
                    url: '/addInvestment',
                    type: 'post',
                    data: {
                        '_token'     : CSRF_TOKEN,
                        'date_app'   : $('#date_app').val(),
                        'afp_serial' : $('#serial_no').val(),
                        'amt_app'    : $('#amt_app').val(),
                        'date_prep'  : $('#date_prep').val(),
                        'prep_by'    : $('#prep_by').val(),
                        'customer_id': customer_id,

                    },
                    success: function (data) {
                        if(data.success === "ok"){
                            window.location.replace("/investments/show/" + data.invId);
                        }
                    },
                    error: function (data) {
                        var errors = '';
                        for(datos in data.responseJSON){
                            errors += data.responseJSON[datos] + '<br>';
                        }
                        console.log(errors);

                    }
                });
            });


            $('select').material_select();



            var form_for_approver = $('#for_approver');

            form_for_approver.hide();

            $('#next').click(function () {
                $('#addLoan').hide();
                $(form_for_approver).show();
            });

            $('#back').click(function () {
                $('#addLoan').show();
                $(form_for_approver).hide();
            });


            $('select').material_select();

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
            });
        });

    </script>
@endsection