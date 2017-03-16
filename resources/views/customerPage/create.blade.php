@extends('layout')

@section('content')
<div class="row">
    <div class="col s12 m12 l11">
        <div class="row">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            <form class="col s12" method="POST" action="/customerPage/store">
                {{csrf_field()}}
                <h4 class="click">Basic Information</h4>
                <div class="card-panel">
                    <div class="row">
                        <div class="input-field col s12 m12 l4">
                            <input id="first_name" type="text" name="fname" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <input id="middle_name" type="text" name="mname" class="validate">
                            <label for="middle_name">Middle Name</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <input id="last_name" type="text" name="lname" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="home_add" type="text" name="home_add" class="validate">
                            <label for="home_add">Home Address</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="comp_add" type="text" name="comp_add" class="validate">
                            <label for="comp_add">Company Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l4">
                            <input id="birthday" type="date" name="birthday" class="datepicker">
                            <label for="birthday">Birthday</label>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <input id="cel_no" type="text" name="cell_no" class="validate">
                            <label for="cel_no">Cellphone No.</label>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <a href="/addLoan" class=" btn waves-effect waves-light" >Add Loan
                        <i class="material-icons right">add</i>
                    </a>
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
        $('#click').click(function () {
            var CSRF_TOKEN = $('input[name="_token"]').val();
            var all_data = $('form').serialize();
            data = {
                '_token': CSRF_TOKEN,
                'fname' : $('#first_name').val(),
                'mname' : $('#middle_name').val(),
                'lname' : $('#last_name').val(),
                'comp_add' : $('#comp_add').val(),
                'birthday' : $('#birthday').val(),
                'cell_no' : $('#cel_no').val(),
            };
            console.log(data);
            $.ajax({
                url: '/customerPage/store',
                type: 'post',
                data: data,
                success: function(data){
                    console.log(data);
                },
                    error: function(a,b,c){
                    console.log("error");
                }
            });
        });

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 200 // Creates a dropdown of 15 years to control year
            });
    </script>
@endsection