<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mssite extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table mssite

        $post = [
            [
                'siteID' => 'AMO',
                'company' => 'HPU',
                'siteName' => 'Malinau',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'BPN',
                'company' => 'HPU',
                'siteName' => 'Perwakilan Balik Papan',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'DMI',
                'company' => 'HPU',
                'siteName' => 'Damai',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'JKT',
                'company' => 'HPU',
                'siteName' => 'Head Office Jakarta',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'DTA',
                'company' => 'HPU',
                'siteName' => 'Delta',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'HPA',
                'company' => 'HPU',
                'siteName' => 'Hamparan',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'HRC',
                'company' => 'HPU',
                'siteName' => 'HRC',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'JKA',
                'company' => 'HPU',
                'siteName' => 'Head Office Jakarta',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'JTA',
                'company' => 'HPU',
                'siteName' => 'Head Office Jakarta',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'siteID' => 'KDA',
                'company' => 'HPU',
                'siteName' => 'Kendawangan',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ]
        ];

        DB::table('mssite')->insert($post);
    }
}
