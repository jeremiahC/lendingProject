@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card">
                <div class="card-content">
                    <ul class="collection">
                        @foreach($users as $user)
                            <li class="collection-item avatar">
                                <i class="material-icons circle">perm_identity</i>
                                <span class="title">{{$user->name}}</span>
                                <p>{{$user->email}}
                                </p>
                                <a href="/user/{{$user->id}}" class="secondary-content"><i class="material-icons green-text">visibility</i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
