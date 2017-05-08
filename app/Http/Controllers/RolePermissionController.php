<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perms = Permission::all();
        return view('settings.rolesPrev', compact('perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRolePerm(Request $request, Role $role)
    {
        $role->name = $request->role_name;
        $role->display_name = $request->disp_name;
        $role->description = $request->descrpt;
        $role->save();

        foreach ($request->permissions as $permName) {
            $perm = new Permission();
            $permissions = $perm->findByName($permName);

            foreach ($permissions as $perms){
                $role->attachPermission($perms->id);
            }
        }
    }

    public function addRole(Request $request, User $user_id){

        $user = $user_id->find($request->user_id);
        $user->attachRole($request->role);

    }

    public function destroyRoleUser($id, Role $role, Request $request)
    {
        $role->deleteRole($request->user_id, $id);
        return "success";
    }
}
