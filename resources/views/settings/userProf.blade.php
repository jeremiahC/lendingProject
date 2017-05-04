@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m11 l11">
            <h5>User Profile</h5>
            <div class="row card-panel">
                <div class="col s12 m6 l5">
                    <label>Name</label>
                    <input type="text" value="{{Auth::user()->name}}" readonly>
                    <a href=""><i class="material-icons right">pencil</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

