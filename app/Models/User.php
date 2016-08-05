<?php

namespace App\Models;

use Eloquent as Model;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model
{
    use EntrustUserTrait;
    public $table = 'users';
    protected $fillable = ['name', 'email','password'];
    /***
     * Checking for Roles & Permissions
       Now we can check for roles and permissions simply by doing
         $user->hasRole('admin');   // true
         $user->can('edit-user');   // false
         $user->hasRole(['owner', 'admin'], true);       // false, user does not have admin role
         $user->can(['edit-user', 'create-post']);       // true
     // match any admin permission
         $user->can("admin.*"); // true

    // match any permission about users
        $user->can("*_users"); // true
     */


    public function updateUser($array)
    {
        $flight = $this->find($array['id']);
        $flight->name         = $array['name'];
        $flight->email = $array['email']; // optional
        $flight->save();
        //删除以前的old角色
        UserRole::where('user_id', $array['id'])->delete();
        //绑定角色
        $flight->attachRoles($array['role']);
    }



}
