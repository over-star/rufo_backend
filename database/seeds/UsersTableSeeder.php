<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => '775397252@qq.com',
                'password' => '$2y$10$VF/WMt3i7W/x6n.Ruv4YuuT9ZEyYYzlgxP9Xvaf81Mpa1kncy2Tk.',
                'remember_token' => 'Eryfnr5Qk69Hy5QEzv6P5lgROpeRVFJbs2McyzyVIlSZZTD0BxSQbbygHcd5',
                'created_at' => '2016-07-31 09:54:11',
                'updated_at' => '2016-08-05 02:49:15',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '775397252',
                'email' => 'admin@qq.com',
                'password' => '$2y$10$h08SdE/SEYNvKcidkxG7AOmCddJaX01AEFI9dvxRvrDcOBwaM5XGm',
                'remember_token' => 'NOd0POR62M56pCVStQfpJku8WE0eRs9IPJlE0WziggOhtcVVdZtxGRImsYRb',
                'created_at' => '2016-08-03 08:16:01',
                'updated_at' => '2016-08-05 06:47:03',
            ),
        ));
        
        
    }
}
