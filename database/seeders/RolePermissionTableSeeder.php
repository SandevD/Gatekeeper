<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permission')->delete();
        
        \DB::table('role_permission')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'create department',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            1 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'create exit pass',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            2 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'create overtime',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            3 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'create roles',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            4 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'create users',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            5 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'delete department',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            6 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'delete exit pass',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            7 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'delete overtime',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            8 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'delete roles',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            9 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'delete users',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            10 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'edit department',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            11 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'edit exit pass',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            12 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'edit overtime',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            13 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'edit roles',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            14 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'edit users',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            15 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'view department',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            16 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'view exit pass',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            17 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'view overtime',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            18 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'view roles',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            19 => 
            array (
                'role_id' => 1,
                'permission_slug' => 'view users',
                'created_at' => '2023-12-05 11:03:28',
                'updated_at' => '2023-12-05 11:03:28',
            ),
            20 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'create exit pass',
                'created_at' => '2023-12-05 11:03:45',
                'updated_at' => '2023-12-05 11:03:45',
            ),
            21 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'create overtime',
                'created_at' => '2023-12-05 11:03:45',
                'updated_at' => '2023-12-05 11:03:45',
            ),
            22 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'create users',
                'created_at' => '2023-12-05 11:03:45',
                'updated_at' => '2023-12-05 11:03:45',
            ),
            23 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'edit users',
                'created_at' => '2023-12-05 11:03:45',
                'updated_at' => '2023-12-05 11:03:45',
            ),
            24 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'view exit pass',
                'created_at' => '2023-12-05 11:03:45',
                'updated_at' => '2023-12-05 11:03:45',
            ),
            25 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'view overtime',
                'created_at' => '2023-12-05 11:03:45',
                'updated_at' => '2023-12-05 11:03:45',
            ),
            26 => 
            array (
                'role_id' => 2,
                'permission_slug' => 'view users',
                'created_at' => '2023-12-05 11:03:45',
                'updated_at' => '2023-12-05 11:03:45',
            ),
            27 => 
            array (
                'role_id' => 3,
                'permission_slug' => 'view exit pass',
                'created_at' => '2023-05-19 05:29:04',
                'updated_at' => '2023-05-19 05:29:04',
            ),
            28 => 
            array (
                'role_id' => 4,
                'permission_slug' => 'create exit pass',
                'created_at' => '2023-12-05 11:04:31',
                'updated_at' => '2023-12-05 11:04:31',
            ),
            29 => 
            array (
                'role_id' => 4,
                'permission_slug' => 'create overtime',
                'created_at' => '2023-12-05 11:04:31',
                'updated_at' => '2023-12-05 11:04:31',
            ),
            30 => 
            array (
                'role_id' => 4,
                'permission_slug' => 'view exit pass',
                'created_at' => '2023-12-05 11:04:31',
                'updated_at' => '2023-12-05 11:04:31',
            ),
            31 => 
            array (
                'role_id' => 4,
                'permission_slug' => 'view overtime',
                'created_at' => '2023-12-05 11:04:31',
                'updated_at' => '2023-12-05 11:04:31',
            ),
            32 => 
            array (
                'role_id' => 5,
                'permission_slug' => 'view department',
                'created_at' => '2023-05-19 16:06:28',
                'updated_at' => '2023-05-19 16:06:28',
            ),
            33 => 
            array (
                'role_id' => 5,
                'permission_slug' => 'view exit pass',
                'created_at' => '2023-05-19 16:06:28',
                'updated_at' => '2023-05-19 16:06:28',
            ),
            34 => 
            array (
                'role_id' => 5,
                'permission_slug' => 'view users',
                'created_at' => '2023-05-19 16:06:28',
                'updated_at' => '2023-05-19 16:06:28',
            ),
            35 => 
            array (
                'role_id' => 7,
                'permission_slug' => 'view exit pass',
                'created_at' => '2023-05-26 08:53:55',
                'updated_at' => '2023-05-26 08:53:55',
            ),
        ));
        
        
    }
}