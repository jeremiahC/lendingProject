@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l11">
            <div class="row">
                <form class="col s12" method="post" action="/customerPage/update/{{$id}}">
                    {{csrf_field()}}

                    <h4>Edit Information</h4>
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field col s12 m12 l4">
                                <span class="error"></span>
                                <input id="first_name" type="text" name="fname" class="validate" value="{{$fname}}" required>
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <span class="error"></span>
                                <input id="middle_name" type="text" name="mname" class="validate" value="{{$mname}}" required>
                                <label for="middle_name">Middle Name</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <span class="error"> </span>
                                <input id="last_name" type="text" name="lname" class="validate" value="{{$lname}}" required>
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <span class="error"></span>
                                <input id="home_add" type="text" name="home_add" class="validate" value="{{$homeAdd}}" required>
                                <label for="home_add">Home Address</label>
                            </div>
                            <div class="input-field col s12">
                                <span></span>
                                <input id="comp_add" type="text" name="comp_add" class="validate" value="{{$compAdd}}" required>
                                <label for="comp_add">Company Address</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l6">
                                <span class="error"></span>
                                <input id="birthday" type="date" name="birthday" class="datepicker" value="{{$birthday}}" required>
                                <label for="birthday">Birthday</label>
                            </div>
                            <div class="input-field col s12 m12 l6">
                                <span class="error"></span>
                                <input id="cel_no" type="text" name="cell_no" class="validate" value="{{$cellNo}}" required >
                                <label for="cel_no">Cellphone No.</label>
                            </div>

                        </div>

                    </div>
                    <div class="right">
                        <button class=" btn waves-effect waves-light" type="submit">Submit
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
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 200 // Creates a dropdown of 15 years to control year
    });
</script>
@endsection