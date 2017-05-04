@extends('layout')

@section('content')

    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card">
                <div class="card-title">User Info</div>
                <div class="card-content">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card">
                <div class="card-title">Role and Permission</div>
                <div class="card-content">
                    <div class="row">
                        <input type="text" value="{{$id->id}}" id="user_id" hidden>
                            <form class="input-field col s12 m6">
                                {{csrf_field()}}
                                <select id="role">
                                    <option value="" disabled selected>Choose your option</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                                <label>Materialize Select</label>
                                <button type="button" class="btn" id="submit">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('select').material_select();

            var CSRF_TOKEN = $('input[name="_token"]').val();
            $('#submit').click(function () {
                var data = {
                    '_token'    : CSRF_TOKEN,
                    'role'      : $('#role').val(),
                    'user_id'   : $('#user_id').val()
                };

                $.ajax({
                    url: '/addRole',
                    type: 'post',
                    data: data,
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection