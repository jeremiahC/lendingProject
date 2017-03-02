
@extends('layout')

@section('content')


    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>

        </form>
    </div>

<div class="row">
    <form class="col s12">
        <div class="row">
            <label>Materialize File Input</label>
            <div class="file-field input-field dropify">
                <div class="btn">
                    <span>Browse</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload file">
                </div>
            </div>
        </div>
        <div>
            <button class="btn waves-effect waves-light btn-large red" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
        </div>

            </form>
</div>
{{--</body>--}}
{{--</html>--}}
@endsection
