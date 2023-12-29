<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('buildings')->delete();

        \DB::table('buildings')->insert(array (
            0 =>
            array (
                'id' => 1,
                'organization_id' => 1,
                'name' => 'LIS Nugegoda',
                'created_at' => '2023-05-27 22:22:03',
                'updated_at' => '2023-05-27 22:30:25',
            ),
            1 =>
            array (
                'id' => 2,
                'organization_id' => 1,
                'name' => 'Lyceum Campus',
                'created_at' => '2023-05-27 22:22:10',
                'updated_at' => '2023-05-27 22:29:17',
            ),
        ));


    }
}
