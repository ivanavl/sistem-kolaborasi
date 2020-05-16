<?php

use Illuminate\Database\Seeder;

class JenisIklansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_iklans')->insert([
            ['nama_jenis_iklan' => 'spot iklan'],
            ['nama_jenis_iklan' => 'talkshow'],
            ['nama_jenis_iklan' => 'ads lips'],
        ]);
    }
}
