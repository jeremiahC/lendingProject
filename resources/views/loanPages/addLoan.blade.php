@extends('layout')

@section('content')

<div class="row" id="addLoan">
    <form class="col s12 m12 l11" method="post" action="/addLoan/store">
        {{csrf_field()}}
        <div class="card-panel">
            <div class="row">
                <div class="col s12 m12 l6">
                    <div class="input-field">
                        <input id="date_app" type="date" class="datepicker" name="date_app">
                        <label for="date_app">Date Applied</label>
                    </div>
                    <div class="input-field">
                        <div class="row">
                            <input type="checkbox" class="filled-in" id="filled-in-box"/>
                            <label for="filled-in-box">check if AFP personel</label>
                        </div>
                        <input type="text" id="serial_no" class="validate" name="afp_serial" disabled>

                    </div>
                    <div class="input-field">
                        <input type="number" id="amt_app" class="validate" name="amt_app">
                        <label for="amt_app">Amount applied</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="colat" class="validate" name="col_off">
                        <label for="colat">Colateral offered</label>
                    </div>
                    <div class="input-field">
                        <input type="text" id="co_make" class="validate" name="co_makers">
                        <label for="co_make">Co-maker(s)</label>
                    </div>
                </div>
                <div class="col s12 m12 l5 right">
                    <div class="input-field">
                        <input type="date" id="date_prep" class="datepicker" name="date_prep">
                        <label for="date_prep">Date Prepared</label>
                    </div>
                    <div class="input-field">
                        <select name="prep_by" id="prep_by">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                        </select>
                        <label>Prepared By</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="right">
            <button class=" btn waves-effect waves-light" id="save_loan" type="submit">Save
                <i class="material-icons right">add</i>
            </button>
            <button class=" btn waves-effect waves-light" id="next" type="button">Next
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>

@include('loanPages.approveAddLoan')

@endsection

@section('script')
    <script>
        $(document).ready(function(){

//            $('#save_loan').click(function (e) {
//
//                e.preventDefault();
//                var CSRF_TOKEN = $('input[name="_token"]').val();
//
//                $.ajax({
//                    url: '/addLoan/store',
//                    type: 'post',
//                    data: {
//                        '_token': CSRF_TOKEN,
//                        'date_app' : $('#date_app').val(),
//                        'afp_serial' : $('#serial_no').val(),
//                        'amt_app' : $('#amt_app').val(),
//                        'col_off' : $('#colat').val(),
//                        'co_makers' : $('#co_make').val(),
//                        'date_prep' : $('#date_prep').val(),
//                        'prep_by' : $('#prep_by').val()
//
//                    },
//                    success: function (data) {
//                        console.log(data);
//                    },
//                    error: function (data) {
//                        var errors = '';
//                        for(datos in data.responseJSON){
//                            errors += data.responseJSON[datos] + '<br>';
//                        }
//                        console.log(errors);
//
//                    }
//                });
//            });


            $('select').material_select();

            $('input[type="checkbox"]').change(function(){
                    if($(this).is(':checked')){
                        $('#serial_no').removeAttr('disabled');
                    }else{
                        $('#serial_no').attr('disabled', 'disabled');
                    }

            });

            var form_for_approver = $('#for_approver');
            form_for_approver.hide();
            $('#next').click(function () {
                $('#addLoan').hide();
                $(form_for_approver).show();
            });


            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15 // Creates a dropdown of 15 years to control year
            });
        });

    </script>
@endsection