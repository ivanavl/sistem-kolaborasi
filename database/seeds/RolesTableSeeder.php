<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['nama_role' => 'Traffic Iklan'],
            ['nama_role' => 'Marketing'],
            ['nama_role' => 'Produksi'],
            ['nama_role' => 'Studio']
        ]);
    }
}
