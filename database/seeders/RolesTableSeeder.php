<?php

namespace Database\Seeders;

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
                'id' => 1,
                'slug' => 'administrator',
                'name' => 'Administrator',
                'created_at' => '2023-05-19 03:36:15',
                'updated_at' => '2023-05-19 03:36:15',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'leader',
                'name' => 'Leader',
                'created_at' => '2023-05-19 03:39:09',
                'updated_at' => '2023-05-19 03:39:09',
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'gatekeeper',
                'name' => 'Gatekeeper',
                'created_at' => '2023-05-19 03:41:46',
                'updated_at' => '2023-05-19 03:41:46',
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'staff',
                'name' => 'Staff',
                'created_at' => '2023-05-19 03:42:09',
                'updated_at' => '2023-05-19 03:42:09',
            ),
            4 => 
            array (
                'id' => 5,
                'slug' => 'hr',
                'name' => 'HR',
                'created_at' => '2023-05-19 16:06:28',
                'updated_at' => '2023-05-19 16:06:28',
            ),
            5 => 
            array (
                'id' => 6,
                'slug' => 'guest',
                'name' => 'Guest',
                'created_at' => '2023-05-26 08:52:58',
                'updated_at' => '2023-05-26 08:52:58',
            ),
            6 => 
            array (
                'id' => 7,
                'slug' => 'organization',
                'name' => 'organization',
                'created_at' => '2023-05-26 08:53:55',
                'updated_at' => '2023-05-26 08:53:55',
            ),
        ));
        
        
    }
}