<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class karyawan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table karyawan
        $post = [
            [
                'nick' => '90011002',
                'nama' => 'Achadi',
                'jabatan' => 'Operation & HCMGA Director',
                'site' => 'JKA'
            ],
            [
                'nick' => '90011025',
                'nama' => 'Udin Solehudin',
                'jabatan' => 'Engineering Manager',
                'site' => 'JKA'
            ],
            [
                'nick' => '90012004',
                'nama' => 'Didik Joko',
                'jabatan' => 'Business Unit Deputy General Manager',
                'site' => 'JKA'
            ],
            [
                'nick' => '80713032',
                'nama' => 'Adriyanta Zudisantosa',
                'jabatan' => 'project manager',
                'site' => 'DTA'
            ],
            [
                'nick' => '90011005',
                'nama' => 'Rochman Alamsjah',
                'jabatan' => 'Plan General Manager',
                'site' => 'DTA'
            ],
            [
                'nick' => '70111489',
                'nama' => 'Agus Susanto',
                'jabatan' => 'Project Manager',
                'site' => 'DTA'
            ],
            [
                'nick' => '90111053',
                'nama' => 'Andre Wijaya',
                'jabatan' => 'Project Manager',
                'site' => 'HRC'
            ],
            [
                'nick' => '10111868',
                'nama' => 'Budi Setiawan',
                'jabatan' => 'Project Manager',
                'site' => 'HRC'
            ],
            [
                'nick' => '12111808',
                'nama' => 'Andi Sukma',
                'jabatan' => 'Project Manager',
                'site' => 'HRC'
            ],
        ];
        DB::table('karyawan')->insert($post);
    }
}
