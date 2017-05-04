@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m11 l11">
            <h5>Role Permission</h5>
            <div class="row card-panel">
                    <form>
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col s12 m4 l4">
                                <label>Name of Role</label>
                                <input type="text" name="role_name" id="role_name">
                                <label>Display Name</label>
                                <input type="text" name="disp_name" id="disp_name">
                                <label>Description</label>
                                <input type="text" name="descrpt" id="descrpt">
                            </div>
                        </div>
                        <div class="row" id="add_edit">
                            <div class="col s12 m3 l3">
                                <span class="green-text">Permissions</span>
                                <div class="divider row"></div>
                                @foreach($perms as $perm)
                                    <div class="row">
                                        <input type="checkbox" class="filled-in" id="{{$perm->name}}" value="{{$perm->name}}">
                                        <label for="{{$perm->name}}">{{$perm->display_name}}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="row">
                            <button class="btn" type="button">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.btn').click(function(e){
                e.preventDefault();

                var CSRF_TOKEN = $('input[name="_token"]').val();

                var permissions = [];

                $('input:checked').each(function () {
                    permissions.push($(this).val());
                });

                var data = {
                    '_token': CSRF_TOKEN,
                    'role_name': $('#role_name').val(),
                    'disp_name': $('#disp_name').val(),
                    'desrpt':   $('#descrpt').val(),
                    'permissions' : permissions
                };



                $.ajax({
                    url: '/storeRole',
                    type: 'post',
                    data: data,
                    success: function(data){
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