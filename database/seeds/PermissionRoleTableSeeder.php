<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 19,
            ),
            1 => 
            array (
                'permission_id' => 1,
                'role_id' => 20,
            ),
            2 => 
            array (
                'permission_id' => 5,
                'role_id' => 19,
            ),
            3 => 
            array (
                'permission_id' => 5,
                'role_id' => 20,
            ),
            4 => 
            array (
                'permission_id' => 6,
                'role_id' => 19,
            ),
            5 => 
            array (
                'permission_id' => 6,
                'role_id' => 20,
            ),
            6 => 
            array (
                'permission_id' => 13,
                'role_id' => 19,
            ),
        ));
        
        
    }
}
