<?php
/**
 * Created by PhpStorm.
 * User: marskie
 * Date: 5/2/2017
 * Time: 5:59 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public function findByName($permName){
        $perms = DB::table('permissions')->where('name', $permName)->get();

        return $perms;
    }
}