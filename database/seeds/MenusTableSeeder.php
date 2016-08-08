<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '用户管理',
                'url' => '#',
                'active' => 'active open',
                'permission_id' => 1,
                'sort' => 0,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-03 10:05:10',
                'updated_at' => '2016-08-03 10:05:10',
                'parent_id' => 0,
                'active_url' => 'admin*',
                'icon' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '菜单列表',
                'url' => 'admin/menu',
                'active' => 'active open',
                'permission_id' => 12,
                'sort' => 0,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-03 10:06:56',
                'updated_at' => '2016-08-05 10:29:58',
                'parent_id' => 1,
                'active_url' => '/admin/menu',
                'icon' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '用户列表',
                'url' => 'admin/user',
                'active' => 'active open',
                'permission_id' => 8,
                'sort' => 0,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-04 06:25:53',
                'updated_at' => '2016-08-04 06:25:53',
                'parent_id' => 1,
                'active_url' => '/admin/user',
                'icon' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '权限列表',
                'url' => 'admin/permission ',
                'active' => 'active open',
                'permission_id' => 10,
                'sort' => 2,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-04 06:42:21',
                'updated_at' => '2016-08-04 06:42:21',
                'parent_id' => 1,
                'active_url' => '/admin/permission',
                'icon' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '角色列表',
                'url' => 'admin/role',
                'active' => 'active open',
                'permission_id' => 9,
                'sort' => 4,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-04 06:43:03',
                'updated_at' => '2016-08-04 06:43:03',
                'parent_id' => 1,
                'active_url' => '/admin/role',
                'icon' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => '日志管理',
                'url' => '#',
                'active' => 'active open',
                'permission_id' => 5,
                'sort' => 1,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-04 06:46:33',
                'updated_at' => '2016-08-08 18:04:20',
                'parent_id' => 0,
                'active_url' => 'logs*',
                'icon' => 'icon-briefcase',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => '查看日志',
                'url' => 'logs',
                'active' => 'active open',
                'permission_id' => 6,
                'sort' => 0,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-04 06:47:30',
                'updated_at' => '2016-08-08 17:21:36',
                'parent_id' => 7,
                'active_url' => '/logs-2',
                'icon' => '',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => '文章管理',
                'url' => 'background/articles',
                'active' => 'active open',
                'permission_id' => 15,
                'sort' => 0,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-08 12:36:47',
                'updated_at' => '2016-08-08 12:50:33',
                'parent_id' => 0,
                'active_url' => 'background/articles',
                'icon' => NULL,
            ),
            8 => 
            array (
                'id' => 11,
                'name' => '标签管理',
                'url' => 'background/tags',
                'active' => 'active open',
                'permission_id' => 14,
                'sort' => 0,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-08 13:15:19',
                'updated_at' => '2016-08-08 13:15:19',
                'parent_id' => 0,
                'active_url' => 'background/tags',
                'icon' => NULL,
            ),
            9 => 
            array (
                'id' => 12,
                'name' => '测试菜单',
                'url' => 'background/posts',
                'active' => 'active open',
                'permission_id' => 1,
                'sort' => 0,
                'is_system' => 1,
                'email' => '',
                'created_at' => '2016-08-08 13:21:09',
                'updated_at' => '2016-08-08 13:21:09',
                'parent_id' => 0,
                'active_url' => 'background/posts',
                'icon' => NULL,
            ),
        ));
        
        
    }
}
