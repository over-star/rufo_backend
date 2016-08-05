<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'view-backend',
                'display_name' => '浏览后台',
                'description' => '该权限可以浏览后台',
                'created_at' => '2016-08-01 06:49:15',
                'updated_at' => '2016-08-01 06:49:15',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'logs',
                'display_name' => '日志管理',
                'description' => '日志管理',
                'created_at' => '2016-08-04 06:13:29',
                'updated_at' => '2016-08-04 06:13:29',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'logs-2',
                'display_name' => '查看日志',
                'description' => '查看日志',
                'created_at' => '2016-08-04 06:14:09',
                'updated_at' => '2016-08-04 06:14:09',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'admin',
                'display_name' => '用户管理',
                'description' => '用户管理',
                'created_at' => '2016-08-04 06:14:50',
                'updated_at' => '2016-08-04 06:14:50',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'admin/user',
                'display_name' => '用户列表',
                'description' => '用户列表',
                'created_at' => '2016-08-04 06:15:18',
                'updated_at' => '2016-08-04 06:15:18',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'admin/role',
                'display_name' => '角色列表',
                'description' => '角色列表',
                'created_at' => '2016-08-04 06:15:34',
                'updated_at' => '2016-08-04 06:22:50',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'admin/permission',
                'display_name' => ' 权限列表',
                'description' => ' 权限列表',
                'created_at' => '2016-08-04 06:15:50',
                'updated_at' => '2016-08-04 06:15:50',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'admin/menu',
                'display_name' => ' 菜单列表',
                'description' => ' 菜单列表',
                'created_at' => '2016-08-04 06:23:20',
                'updated_at' => '2016-08-04 06:23:20',
            ),
            8 => 
            array (
                'id' => 13,
                'name' => 'admin/index',
                'display_name' => '控制台',
                'description' => '控制台',
                'created_at' => '2016-08-04 06:23:52',
                'updated_at' => '2016-08-04 06:23:52',
            ),
            9 => 
            array (
                'id' => 14,
                'name' => 'admin/tags',
                'display_name' => '标签管理',
                'description' => '标签管理',
                'created_at' => '2016-08-04 11:11:44',
                'updated_at' => '2016-08-04 11:11:44',
            ),
        ));
        
        
    }
}
