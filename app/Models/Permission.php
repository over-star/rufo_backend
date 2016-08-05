<?php

namespace App\Models;
use App\Models\Role;
use Zizaco\Entrust\EntrustPermission;
class Permission extends EntrustPermission
{
    /**
     * 添加权限
     * add role
     */
    public function addPermission($permission_name,$display_name,$description)
    {
        $this->name         = $permission_name;
        $this->display_name = $display_name; // optional
        $this->description  = $description; // optional
        $this->save();
    }
    /**
     * 添加权限
     * add role
     */
    public function updatePermission($array)
    {
        $flight = $this->find($array['id']);
        $flight->name         = $array['name'];
        $flight->display_name = $array['display_name']; // optional
        $flight->description  = $array['description']; // optional
        $flight->save();
    }
    /***
     * 分配权限给角色
     * roles created let's assign them to the users
     */
    public function permissionToRole($role_id,$permission_id){
        $role = Role::where('id', '=', $role_id)->first();
        $role->perms()->sync(array($permission_id));
    }
    /***
     * 分配许多权限给角色
     * permissions created let's assign them to the role
     */
    public function permissionsToRole($role_id,$role_array){
        $role = Role::where('id', '=', $role_id)->first();
        $role->perms()->sync($role_array);
    }


}
