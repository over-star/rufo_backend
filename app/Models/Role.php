<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use App\Models\Permission;
use DB;
class Role extends EntrustRole
{
    /**
     * 添加角色
     * add role
     */
    public function addRole($role_name,$display_name,$description,$permission_array)
    {
        $this->name         = $role_name;
        $this->display_name = $display_name; 
        $this->description  = $description; 
        $this->save();
        //绑定权限
        $this->attachPermissions($permission_array);
    }
    public function updateRole($array)
    {
        $flight = $this->find($array['id']);
        $flight->name         = $array['name'];
        $flight->display_name = $array['display_name']; // optional
        $flight->description  = $array['description']; // optional
        $flight->save();
        //删除以前的old权限
        PermissionRole::where('role_id', $array['id'])->delete();
        //绑定权限
        $flight->attachPermissions($array['join_permission']);
    }


    /***
     * 分配角色给用
     * roles created let's assign them to the users
     */
    public function roleToUser($user_id,$role_id){
        $user = User::where('id', '=', $user_id)->first();
        $user->roles()->attach($role_id); // id only
    }
    /***
     * 分配许多角色给用户
     * roles created let's assign them to the users
     */
    public function rolesToUser($user_id,$role_array){
        $user = User::where('id', '=', $user_id)->first();
        $user->attachRole($role_array);
    }




}
