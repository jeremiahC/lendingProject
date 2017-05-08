<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user){
        if(Auth::user()->hasRole('ADMIN-USER')) {
            $users = $user->all();
            return view('settings.userList', compact('users'));
        }else{
            return view('errorMessages.error');
        }
    }

    public function show(User $id, Role $role){
        $roles = $role->all();
        $userRoles = $id->role($id->id);
        return view('settings.user.show', compact('id', 'roles', 'userRoles'));
    }
}
