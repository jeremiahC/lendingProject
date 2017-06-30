@extends('layout')

@section('content')
<div class="row">
    <div class="col s12 m12 l11">
        <div class="row">

            <p id="error"></p>

            <form class="col s12" id="form" method="post" action="/customerPage/store">
                {{csrf_field()}}
                <h4 class="click">Basic Information</h4>
                <div class="card-panel">
                    <div class="row">
                        <div class="input-field col s12 m12 l4">
                            <span class="error"></span>
                            <input id="first_name" type="text" name="fname" class="validate" required>
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <span class="error"></span>
                            <input id="middle_name" type="text" name="mname" class="validate" required>
                            <label for="middle_name">Middle Name</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <span class="error"> </span>
                            <input id="last_name" type="text" name="lname" class="validate" required>
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <span class="error"></span>
                            <input id="home_add" type="text" name="home_add" class="validate" required>
                            <label for="home_add">Home Address</label>
                        </div>
                        <div class="input-field col s12">
                            <span></span>
                            <input id="comp_add" type="text" name="comp_add" class="validate">
                            <label for="comp_add">Company Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <span class="error"></span>
                            <input id="birthday" type="date" name="birthday" class="datepicker" required>
                            <label for="birthday">Birthday</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <span class="error"></span>
                            <input id="cel_no" type="text" name="cell_no" class="validate" required >
                            <label for="cel_no">Cellphone No.</label>
                        </div>

                    </div>
                    <div class="input-field">
                        <div class="row">
                            <input type="checkbox" class="filled-in" id="filled-in-box"/>
                            <label for="filled-in-box">check if AFP personel</label>
                        </div>
                        <input type="text" id="serial_no" class="validate" name="afp_serial" disabled>
                    </div>
                </div>
                <div class="right">
                    <button class=" btn waves-effect waves-light" id="click" type="submit">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
            @include('errorMessages.success')

        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $('#click').click(function (e) {

                var CSRF_TOKEN = $('input[name="_token"]').val();

                $("#form").validate({
                        rules:{
                            fname: "required",
                            mname: "required",
                            lname: "required",
                            home_add: "required",
                            birthday: "required",
                            cell_no: {
                                required: true,
                                minlength: 11,
                                maxlength: 11,
                            }
                        },
                        messages:{
                            fname: "Please Enter Your Firstname",
                            lname: "Please Enter Your Lastname",
                            mname: "Please Enter Your Middlename",
                            home_add: "Enter an home address",

                        },
                        submitHandler: function(form) {

                            var all_data = {
                                '_token': CSRF_TOKEN,
                                'fname' : $('#first_name').val(),
                                'mname' : $('#middle_name').val(),
                                'lname' : $('#last_name').val(),
                                'home_add' : $('#home_add').val(),
                                'comp_add' : $('#comp_add').val(),
                                'birthday' : $('#birthday').val(),
                                'cell_no' : $('#cel_no').val(),
                                'afp_serial' : $('#serial_no').val(),
                            };

                            $.ajax({
                                url: form.action,
                                type: form.method,
                                data: all_data,
                                success: function(data){
                                    console.log('success');
                                    window.location.replace("/customerPage");
                                    $('#my-modal').modal('open');
                                },
                                error: function(data){
                                    console.log(data);
                                }
                            });
                        },
                        errorElement : 'span',
                        errorPlacement: function(error, element) {
                            var placement = $(element).data('error');
                            if (placement) {
                                $(placement).append(error)
                            } else {
                                error.insertAfter(element);
                            }
                        }
                    }
                );

            });

            $('input[type="checkbox"]').change(function(){
                if($(this).is(':checked')){
                    $('#serial_no').removeAttr('disabled');
                }else{
                    $('#serial_no').attr('disabled', 'disabled');
                }

            });
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 200 // Creates a dropdown of 15 years to control year
            });
        });


    </script>
@endsection