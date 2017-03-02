@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l11">
            <div class="row">
                <form class="col s12">
                    <h4>Edit Information</h4>
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field col s12 m12 l4">
                                <input id="first_name" type="text" class="validate">
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <input id="middle_name" type="text" class="validate">
                                <label for="middle_name">Middle Name</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="home_add" type="text" class="validate">
                                <label for="home_add">Home Address</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="comp_add" type="text" class="validate">
                                <label for="comp_add">Company Address</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l4">
                                <input id="birthday" type="text" class="validate">
                                <label for="birthday">Birthday</label>
                            </div>
                            <div class="input-field col s12 m12 l4">
                                <input id="cel_no" type="text" class="validate">
                                <label for="cel_no">Cellphone No.</label>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <button class=" btn waves-effect waves-light"  name="action">Add Loan
                            <i class="material-icons right">add</i>
                        </button>
                        <button class=" btn waves-effect waves-light" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection