<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class namemeet extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table namemeet

        $post = [
            [
                'nameID' => 'CFOR',
                'company' => 'HPU',
                'siteName' => 'Malinau',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'nameID' => 'MPR',
                'company' => 'HPU',
                'siteName' => 'Perwakilan Balik Papan',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'nameID' => 'Kpi Review',
                'company' => 'HPU',
                'siteName' => 'Damai',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'nameID' => 'Mid Review',
                'company' => 'HPU',
                'siteName' => 'Head Office Jakarta',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'nameID' => 'Annual Meeting',
                'company' => 'HPU',
                'siteName' => 'Delta',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
            [
                'nameID' => 'Raker Superintendent',
                'company' => 'HPU',
                'siteName' => 'Hamparan',
                'created_by' => 'Razaqa',
                'created_at' => '2022-04-08'
            ],
        ];
        DB::table('namemeet')->insert($post);
    }
}
