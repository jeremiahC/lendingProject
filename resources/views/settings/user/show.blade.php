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
                        @foreach($userRoles as $userRole)
                            <input type="text" class="user-roles" value="{{$userRole->name}}" hidden>
                        @endforeach
                        <div class="chips"></div>
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
    <a class="btn" href="/userList">Back To List</a>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('select').material_select();

            var CSRF_TOKEN = $('input[name="_token"]').val();

            $('.chips').material_chip({
                data: [
                    @foreach($userRoles as $userRole)
                        {
                            tag : '{{$userRole->name}}',
                            id  : '{{$userRole->id}}',
                            userid  : '{{$userRole->user_id}}',
                        },
                    @endforeach
                ]
            });

            $('.chips').on('chip.delete', function(e, chip){
               $.ajax({
                    url: '/deletRole/' + chip.id,
                    type: 'post',
                    data: {
                        '_token'    : CSRF_TOKEN,
                        'user_id'   : chip.userid,
                    },
                    success: function (data) {
                        Materialize.toast('you have successfully deleted ' + chip.tag, 5000);
                    },
                    error: function(data){
                        console.log(data);
                    }
               });
            });


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
                        Materialize.toast('you have added a role', 5000);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection