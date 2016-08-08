<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use App\Models\Permission;
use DB;
class Menu extends Model
{
    /**
     * 添加菜单
     * add role
     */
    public function addMenu($array)
    {
        $this->name         = $array['name'];
        $this->url          = $array['url'];
        $this->active       = $array['active'];
        $this->icon         = $array['icon'];
        $this->active_url   = $array['active_url'];
        $this->sort         = $array['sort'];
        $this->permission_id= $array['permission_id'];
        $this->is_system    = $array['is_system'];
        $this->parent_id    = $array['parent_id'];
        $this->save();
    }

    public function updateMenu($array)
    {
        $flight = $this->find($array['id']);
        $flight->name         = $array['name'];
        $flight->url          = $array['url'];
        $flight->active       = $array['active'];
        $flight->icon         = $array['icon'];
        $flight->active_url   = $array['active_url'];
        $flight->sort         = $array['sort'];
        $flight->permission_id= $array['permission_id'];
        $flight->is_system    = $array['is_system'];
        $flight->parent_id    = $array['parent_id'];
        $flight->save();
    }



}
