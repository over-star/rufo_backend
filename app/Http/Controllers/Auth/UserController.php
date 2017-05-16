<?php

namespace App\Http\Controllers\Auth;

use App\Models\Menu;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    //用户列表
    public function index()
    {
        return view('user.user_list')->withUsers(User::paginate(15));
    }
    //添加用户
    public function add_user(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed:password_confirmation',
        ]);
        if($validator->fails()) {
            return redirect('admin/user')->withErrors($validator)->withInput();
        }
        $data=$request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return redirect('admin/user');
    }
    //删除用户
    public function user_delete(User $user,UserRole $userRole,$id){
        if(!$id) return false;
        $user->destroy($id);
        $userRole->where('user_id', $id)->delete();
        return redirect('admin/user');
    }
    //更新用户
    public function update_user(User $user,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'id'=>'required'
        ]);
        $all=$request->all();
        //判断有没有email
        $is_live=User::where('email',$all['email'])->where('id','<>',$all['id'])->first();
        if($is_live) return redirect('admin/user')->withErrors('邮箱已经存在!')->withInput();
        if ($validator->fails()) {
            return redirect('admin/user')->withErrors($validator)->withInput();
        }

        if(!isset($all['role'])) $all['role']=[];
        $user->updateUser($all);
        return redirect('admin/user');
    }
    //编辑用户
    public function user_edit(User $user,UserRole $userRole,Role $role,$id){
        if(!$id) return false;
        return view('user.user_edit')
            ->withUser($user->find($id))
            ->withRole($role->get())
            ->withHasrole($userRole->select('role_id')->where('user_id',$id)->get());
    }

    //权限列表
    public function permission_list()
    {
        return view('user.permission_list')->withUsers(Permission::paginate(15));
    }
    //添加权限
    public function add_permission(Permission $permission,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:permissions',
            'display_name' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('admin/permission')->withErrors($validator)->withInput();
        }
        $all=$request->all();
        $permission->addPermission($all['name'],$all['display_name'],$all['description']);
        return redirect('admin/permission');
    }
    //编辑权限
    public function update_permission(Permission $permission,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'display_name' => 'required|max:255',
            'description' => 'required',
            'id'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('admin/permission')->withErrors($validator)->withInput();
        }
        $all=$request->all();
        $permission->updatePermission($all);
        return redirect('admin/permission');
    }
    //删除权限
    public function permission_delete(Permission $permission,$id){
        if(!$id) return false;
        $permission->destroy($id);
        return redirect('admin/permission');
    }
    //编辑权限
    public function permission_edit(Permission $permission,$id){
        if(!$id) return false;
        return view('user.permission_edit')->withPermission($permission->find($id));
    }
    
    //角色列表
    public function role_list()
    {
        return view('user.role_list')->withRoles(Role::paginate(15))->withPermissions(Permission::get());
    }
    //添加角色
    public function add_role(Role $role,Request $request,Permission $permission){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:roles',
            'display_name' => 'required|max:255',
            'description' => 'required',
        ]);
        if($validator->fails()) {
            return redirect('admin/role')->withErrors($validator)->withInput();
        }

        $all=$request->all();
        if(!isset($all['join_permission'])) $all['join_permission']=[];
        $role->addRole($all['name'],$all['display_name'],$all['description'],$all['join_permission']);
        return redirect('admin/role');
    }
    //删除角色
    public function role_delete(Role $role,PermissionRole $permission,$id){
        if(!$id) return false;
        $role->destroy($id);
        $permission->where('role_id', $id)->delete();
        return redirect('admin/role');
    }
    //更新角色
    public function update_role(Role $role,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'display_name' => 'required|max:255',
            'description' => 'required',
            'id'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('admin/role')->withErrors($validator)->withInput();
        }
        $all=$request->all();
        if(!isset($all['join_permission'])) $all['join_permission']=[];
        $role->updateRole($all);
        return redirect('admin/role');
    }
    //编辑角色
    public function role_edit(Role $role,Permission $permission,PermissionRole $permissionRole,$id){
        if(!$id) return false;
        return view('user.role_edit')
            ->withRole($role->find($id))
            ->withPermission($permission->get())
            ->withHaspremission($permissionRole->select('permission_id')->where('role_id',$id)->get());
    }
    
    
    //菜单列表
    public function menu_list()
    {
        return view('user.menu_list')->withMenus(Menu::paginate(15))->withPermissions(Permission::get());
    }
    //添加菜单
    public function add_menu(Menu $menu,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:menus',
            'url' => 'required',
            'active' => 'required',
            'permission_id' => 'required',
        ]);
        if($validator->fails()) {
            return redirect('admin/menu')->withErrors($validator)->withInput();
        }
        $menu->addMenu($request->all());
        return redirect('admin/menu');
    }
    //编辑菜单
    public function update_menu(Menu $menu,Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'url' => 'required|max:255',
            'permission_id' => 'required',
            'id'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('admin/menu')->withErrors($validator)->withInput();
        }
        $all=$request->all();
        $menu->updateMenu($all);
        return redirect('admin/menu');
    }
    //删除菜单
    public function menu_delete(Menu $Menu,$id){
        if(!$id) return false;
        $Menu->destroy($id);
        return redirect('admin/menu');
    }
    //编辑权限
    public function menu_edit(Menu $menu,$id){
        if(!$id) return false;
        return view('user.menu_edit')->withMenu($menu->find($id))->withMenus(Menu::get())->withPermissions(Permission::get());
    }
    
    public function kzt(){
        return view('kzt');
    }
    
}
