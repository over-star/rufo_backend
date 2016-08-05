<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 19,
                'name' => 'admin',
                'display_name' => '后台管理员',
                'description' => '无敌的存在',
                'created_at' => '2016-08-03 04:25:30',
                'updated_at' => '2016-08-04 08:13:04',
            ),
            1 => 
            array (
                'id' => 20,
                'name' => 'user',
                'display_name' => '浏览后台',
                'description' => '浏览后台而已',
                'created_at' => '2016-08-03 04:29:07',
                'updated_at' => '2016-08-03 04:29:07',
            ),
        ));
        
        
    }
}
