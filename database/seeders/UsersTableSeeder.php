<?php

namespace Database\Seeders;

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
                'employee_code' => NULL,
                'organization_id' => NULL,
                'building_id' => NULL,
                'department_id' => NULL,
                'name' => 'sandev',
                'email' => 'sandev.net@gmail.com',
                'email_verified_at' => NULL,
                'telegram_chat_id' => 5613130787,
                'password' => '$2y$10$Qda6NbMo4sQhQd1iLOruHu1IGDaVZYnGTDhX.Hz1bIzJgx9F2s5xe',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-05-18 10:58:30',
                'updated_at' => '2023-05-19 03:54:46',
            ),
            1 =>
            array (
                'id' => 2,
                'employee_code' => NULL,
                'organization_id' => NULL,
                'building_id' => NULL,
                'department_id' => 27,
                'name' => 'Leader',
                'email' => 'leader@gmail.com',
                'email_verified_at' => NULL,
                'telegram_chat_id' => 5613130787,
                'password' => '$2y$10$ndfkVtnt4e1RBKcx8zV5tu/LyTTd45S7x5XW9vc1Snx0wRfJ3p2ai',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-05-19 03:20:04',
                'updated_at' => '2023-05-19 03:20:04',
            ),
            2 =>
            array (
                'id' => 3,
                'employee_code' => NULL,
                'organization_id' => NULL,
                'building_id' => 2,
                'department_id' => NULL,
                'name' => 'Gatekeeper',
                'email' => 'gatekeeper@gmail.com',
                'email_verified_at' => NULL,
                'telegram_chat_id' => NULL,
                'password' => '$2y$10$IijyiHa0UylPRFdlPJH9WeOu1pK8.8/ZtM4C1yg8J3WoIbO5PekBC',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-05-19 03:52:52',
                'updated_at' => '2023-05-28 22:18:37',
            ),
            3 =>
            array (
                'id' => 4,
                'employee_code' => NULL,
                'organization_id' => NULL,
                'building_id' => NULL,
                'department_id' => 27,
                'name' => 'Staff',
                'email' => 'staff@gmail.com',
                'email_verified_at' => NULL,
                'telegram_chat_id' => NULL,
                'password' => '$2y$10$T/qoSg7YCxvOxYjZoSBQ2.tfn17mfP6upN73wtJ2x5wYv0WP8lDUG',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-05-19 03:54:24',
                'updated_at' => '2023-05-28 22:11:36',
            ),
            4 =>
            array (
                'id' => 5,
                'employee_code' => NULL,
                'organization_id' => NULL,
                'building_id' => NULL,
                'department_id' => NULL,
                'name' => 'HR',
                'email' => 'hr@gmail.com',
                'email_verified_at' => NULL,
                'telegram_chat_id' => NULL,
                'password' => '$2y$10$GuUSHCqEAaoEjGR.1uSANuMv2YYWlPxZhVnvTeQdIkHi49nlFawEq',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-05-19 16:43:32',
                'updated_at' => '2023-05-19 16:43:32',
            ),
            5 =>
            array (
                'id' => 6,
                'employee_code' => NULL,
                'organization_id' => NULL,
                'building_id' => 1,
                'department_id' => NULL,
                'name' => 'lisngatekeeper',
                'email' => 'lisngatekeeper@gmail.com',
                'email_verified_at' => NULL,
                'telegram_chat_id' => NULL,
                'password' => '$2y$10$PyHOJgPpzfZA6JmRMXzG3OxNMKGJ24dZnA0ij2OZNnQSPbHlH/t9K',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2023-05-28 22:20:53',
                'updated_at' => '2023-05-28 22:22:04',
            ),
        ));


    }
}
