<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('departments')->delete();

        \DB::table('departments')->insert(array (
            0 =>
            array (
                'id' => 1,
                'building_id' => 2,
                'name' => 'LYCEUM GLOBAL HOLDINGS',
                'created_at' => '2023-05-18 16:52:22',
                'updated_at' => '2023-05-18 16:52:22',
            ),
            1 =>
            array (
                'id' => 2,
                'building_id' => 2,
                'name' => 'LEDGERWALL',
                'created_at' => '2023-05-18 16:52:28',
                'updated_at' => '2023-05-18 16:52:28',
            ),
            2 =>
            array (
                'id' => 3,
                'building_id' => 2,
                'name' => 'NEXTGEN HUMAN CAPITAL SOLUTIONS',
                'created_at' => '2023-05-18 16:52:38',
                'updated_at' => '2023-05-18 16:52:38',
            ),
            3 =>
            array (
                'id' => 4,
                'building_id' => 2,
                'name' => 'BITROCK',
                'created_at' => '2023-05-18 16:52:43',
                'updated_at' => '2023-05-18 16:52:43',
            ),
            4 =>
            array (
                'id' => 5,
                'building_id' => 2,
                'name' => 'LYCEUM EDUCATION',
                'created_at' => '2023-05-18 16:52:48',
                'updated_at' => '2023-05-18 16:52:48',
            ),
            5 =>
            array (
                'id' => 6,
                'building_id' => 2,
                'name' => 'LYCEUM LEAF SCHOOL',
                'created_at' => '2023-05-18 16:52:51',
                'updated_at' => '2023-05-18 16:52:51',
            ),
            6 =>
            array (
                'id' => 7,
                'building_id' => 2,
                'name' => 'LYCEUM DAY CARE',
                'created_at' => '2023-05-18 16:52:57',
                'updated_at' => '2023-05-18 16:52:57',
            ),
            7 =>
            array (
                'id' => 8,
                'building_id' => 2,
                'name' => 'LYCEUM INTERNATIONAL SCHOOL',
                'created_at' => '2023-05-18 16:53:17',
                'updated_at' => '2023-05-18 16:53:17',
            ),
            8 =>
            array (
                'id' => 9,
                'building_id' => 2,
                'name' => 'THE LYCEUM CAMPUS',
                'created_at' => '2023-05-18 16:53:25',
                'updated_at' => '2023-05-18 16:53:25',
            ),
            9 =>
            array (
                'id' => 10,
                'building_id' => 2,
                'name' => 'LYCEUM PLACEMENTS',
                'created_at' => '2023-05-18 16:53:29',
                'updated_at' => '2023-05-18 16:53:29',
            ),
            10 =>
            array (
                'id' => 11,
                'building_id' => 2,
                'name' => 'LYCEUM ASSESSMENTS',
                'created_at' => '2023-05-18 16:53:34',
                'updated_at' => '2023-05-18 16:53:34',
            ),
            11 =>
            array (
                'id' => 12,
                'building_id' => 2,
                'name' => 'THE LYCEUM ACADEMY',
                'created_at' => '2023-05-18 16:53:39',
                'updated_at' => '2023-05-18 16:53:39',
            ),
            12 =>
            array (
                'id' => 13,
                'building_id' => 2,
                'name' => 'N C G HOLDINGS',
                'created_at' => '2023-05-18 16:53:45',
                'updated_at' => '2023-05-18 16:53:45',
            ),
            13 =>
            array (
                'id' => 14,
                'building_id' => 2,
                'name' => 'N C G AUTOMOTIVE SOLUTIONS',
                'created_at' => '2023-05-18 16:53:50',
                'updated_at' => '2023-05-18 16:53:50',
            ),
            14 =>
            array (
                'id' => 15,
                'building_id' => 2,
                'name' => 'N C G EXPRESS',
                'created_at' => '2023-05-18 16:53:56',
                'updated_at' => '2023-05-18 16:53:56',
            ),
            15 =>
            array (
                'id' => 16,
                'building_id' => 2,
                'name' => 'NCG FLEET MANAGEMENT',
                'created_at' => '2023-05-18 16:54:00',
                'updated_at' => '2023-05-18 16:54:00',
            ),
            16 =>
            array (
                'id' => 17,
                'building_id' => 2,
                'name' => 'N C G MINING',
                'created_at' => '2023-05-18 16:54:05',
                'updated_at' => '2023-05-18 16:54:05',
            ),
            17 =>
            array (
                'id' => 18,
                'building_id' => 2,
                'name' => 'N C G SPARE PARTS',
                'created_at' => '2023-05-18 16:54:09',
                'updated_at' => '2023-05-18 16:54:09',
            ),
            18 =>
            array (
                'id' => 19,
                'building_id' => 2,
                'name' => 'XPRESS AUTO SERVICES',
                'created_at' => '2023-05-18 16:54:13',
                'updated_at' => '2023-05-18 16:54:13',
            ),
            19 =>
            array (
                'id' => 20,
                'building_id' => 2,
                'name' => 'NCG WAREHOUSE SOLUTION',
                'created_at' => '2023-05-18 16:54:20',
                'updated_at' => '2023-05-18 16:54:20',
            ),
            20 =>
            array (
                'id' => 21,
                'building_id' => 2,
                'name' => 'NCG SERENGETI PROPERTY MANAGEMENT',
                'created_at' => '2023-05-18 16:54:26',
                'updated_at' => '2023-05-18 16:54:26',
            ),
            21 =>
            array (
                'id' => 22,
                'building_id' => 2,
                'name' => 'NEXTGEN FACILITY MANAGEMENT',
                'created_at' => '2023-05-18 16:54:31',
                'updated_at' => '2023-05-18 16:54:31',
            ),
            22 =>
            array (
                'id' => 23,
                'building_id' => 2,
                'name' => 'N C G FACILITY MANAGEMENT',
                'created_at' => '2023-05-18 16:54:35',
                'updated_at' => '2023-05-18 16:54:35',
            ),
            23 =>
            array (
                'id' => 24,
                'building_id' => 2,
                'name' => 'VEBUILD INNOVATIONS BY NCG',
                'created_at' => '2023-05-18 16:54:40',
                'updated_at' => '2023-05-18 16:54:40',
            ),
            24 =>
            array (
                'id' => 25,
                'building_id' => 2,
                'name' => 'NEXTGEN SHIELD',
                'created_at' => '2023-05-18 16:54:45',
                'updated_at' => '2023-05-18 16:54:45',
            ),
            25 =>
            array (
                'id' => 26,
                'building_id' => 2,
                'name' => 'N C G GREEN ENERGY',
                'created_at' => '2023-05-18 16:54:49',
                'updated_at' => '2023-05-18 16:54:49',
            ),
            26 =>
            array (
                'id' => 27,
                'building_id' => 2,
                'name' => 'ZUSE TECHNOLOGIES',
                'created_at' => '2023-05-18 16:54:56',
                'updated_at' => '2023-05-27 22:32:23',
            ),
            27 =>
            array (
                'id' => 28,
                'building_id' => 2,
                'name' => 'DREAM TEAM MEDIA',
                'created_at' => '2023-05-18 16:55:01',
                'updated_at' => '2023-05-18 16:55:01',
            ),
            28 =>
            array (
                'id' => 29,
                'building_id' => 2,
                'name' => 'LYCEUM COLLECTION',
                'created_at' => '2023-05-18 16:55:06',
                'updated_at' => '2023-05-18 16:55:06',
            ),
            29 =>
            array (
                'id' => 30,
                'building_id' => 2,
                'name' => 'THE UNIFORM HUB',
                'created_at' => '2023-05-18 16:55:10',
                'updated_at' => '2023-05-18 16:55:10',
            ),
            30 =>
            array (
                'id' => 31,
                'building_id' => 2,
                'name' => 'THE BOOK STUDIO',
                'created_at' => '2023-05-18 16:55:14',
                'updated_at' => '2023-05-18 16:55:14',
            ),
            31 =>
            array (
                'id' => 32,
                'building_id' => 2,
                'name' => 'NEXTGEN PUBLICATIONS',
                'created_at' => '2023-05-18 16:55:19',
                'updated_at' => '2023-05-18 16:55:19',
            ),
            32 =>
            array (
                'id' => 33,
                'building_id' => 2,
                'name' => 'NCG LIBRARY SOLUTIONS',
                'created_at' => '2023-05-18 16:55:23',
                'updated_at' => '2023-05-18 16:55:23',
            ),
            33 =>
            array (
                'id' => 34,
                'building_id' => 2,
                'name' => 'L Y F E KITCHEN',
                'created_at' => '2023-05-18 16:55:28',
                'updated_at' => '2023-05-18 16:55:28',
            ),
            34 =>
            array (
                'id' => 35,
                'building_id' => 2,
                'name' => 'ZEUS GYMNASIUM AND REHABILITATION',
                'created_at' => '2023-05-18 16:55:34',
                'updated_at' => '2023-05-18 16:55:34',
            ),
            35 =>
            array (
                'id' => 36,
                'building_id' => 2,
                'name' => 'HERACLE NUTRITION',
                'created_at' => '2023-05-18 16:55:43',
                'updated_at' => '2023-05-18 16:55:43',
            ),
            36 =>
            array (
                'id' => 37,
                'building_id' => 2,
                'name' => 'HERACLE SPORTS',
                'created_at' => '2023-05-18 16:56:17',
                'updated_at' => '2023-05-18 16:56:17',
            ),
            37 =>
            array (
                'id' => 38,
                'building_id' => 2,
                'name' => 'NCG EARTH',
                'created_at' => '2023-05-18 16:56:29',
                'updated_at' => '2023-05-18 16:56:29',
            ),
            38 =>
            array (
                'id' => 39,
                'building_id' => 2,
                'name' => 'NEXTGEN CARE',
                'created_at' => '2023-05-18 16:56:34',
                'updated_at' => '2023-05-18 16:56:34',
            ),
        ));


    }
}
