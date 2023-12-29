<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('organizations')->delete();
        
        \DB::table('organizations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Lyceum Global Holdings',
                'created_at' => '2023-05-27 22:24:42',
                'updated_at' => '2023-05-27 22:24:42',
            ),
        ));
        
        
    }
}