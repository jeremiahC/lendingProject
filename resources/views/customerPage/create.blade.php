@extends('layout')

@section('content')
<div class="row">
    <div class="col s12 m12 l11">
        <div class="row">

            <p id="error"></p>

            <form class="col s12" id="form" method="get">
                {{csrf_field()}}
                <h4 class="click">Basic Information</h4>
                <div class="card-panel">
                    <div class="row">
                        <div class="input-field col s12 m12 l4">
                            <span class="error"></span>
                            <input id="first_name" type="text" name="fname" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <span class="error"></span>
                            <input id="middle_name" type="text" name="mname" class="validate">
                            <label for="middle_name">Middle Name</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <span class="error"> </span>
                            <input id="last_name" type="text" name="lname" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <span class="error"></span>
                            <input id="home_add" type="text" name="home_add" class="validate">
                            <label for="home_add">Home Address</label>
                        </div>
                        <div class="input-field col s12">
                            <span></span>
                            <input id="comp_add" type="text" name="comp_add" class="validate">
                            <label for="comp_add">Company Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l4">
                            <span class="error"></span>
                            <input id="birthday" type="date" name="birthday" class="datepicker">
                            <label for="birthday">Birthday</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <span class="error"></span>
                            <input id="cel_no" type="text" name="cell_no" class="validate">
                            <label for="cel_no">Cellphone No.</label>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <button class=" btn waves-effect waves-light" id="click" type="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#click').click(function (e) {
            e.preventDefault();
            var CSRF_TOKEN = $('input[name="_token"]').val();
            var all_data = $('form').serialize();
            data = {
                '_token': CSRF_TOKEN,
                'fname' : $('#first_name').val(),
                'mname' : $('#middle_name').val(),
                'lname' : $('#last_name').val(),
                'home_add' : $('#home_add').val(),
                'comp_add' : $('#comp_add').val(),
                'birthday' : $('#birthday').val(),
                'cell_no' : $('#cel_no').val(),
            };
            $.ajax({
                url: '/customerPage/store',
                type: 'post',
                data: data,
                success: function(data){
                    console.log(data);
                },
                error: function(data){
                    var errors = '';
                    for(datos in data.responseJSON){
                        errors += data.responseJSON[datos] + '<br>';
                    }

                    $('#error').show().html(errors);//this is my div with messages
                }
            });
        });

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 200 // Creates a dropdown of 15 years to control year
            });
    </script>
@endsection