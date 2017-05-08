<?php
/**
 * Created by PhpStorm.
 * User: marskie
 * Date: 5/2/2017
 * Time: 5:58 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public function deleteRole($user_id, $role_id){
        DB::table('role_user')
            ->where([
                ['user_id', '=', $user_id],
                ['role_id', '=', $role_id]
            ])
            ->delete();
    }
}