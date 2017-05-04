@extends('layout')

@section('content')
    <div class="row">
        <div class="col s12 m12 l11">
            <div class="card">
                <span class="card-title">Roles and Permissions</span>
                <div class="card-content">
                    @if(Auth::user()->hasRole('ADMIN-USER'))
                        <label>Your Role</label>
                        <input type="text" value="">
                    @endif
                        <blockquote>
                            <ul>
                                <li></li>
                            </ul>
                        </blockquote>

                </div>
            </div>
        </div>
    </div>
@endsection