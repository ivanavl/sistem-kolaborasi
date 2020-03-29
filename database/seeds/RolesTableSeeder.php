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
            ['role_name' => 'Traffic Iklan'],
            ['role_name' => 'Marketing'],
            ['role_name' => 'Produksi'],
            ['role_name' => 'Studio']
        ]);
    }
}
