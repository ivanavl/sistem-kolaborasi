<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'traffic.iklan.dami',
                'password' => 'admin',
                'name'     => 'traffic iklan dami',
                'email'    => 'tf@dami.com',
                'id_role'=> '1'
            ],
            [
                'username' => 'marketing.dami',
                'password' => 'admin',
                'name'     => 'marketing dami',
                'email'    => 'm@dami.com',
                'id_role'=> '2'
            ],
            [
                'username' => 'produksi.dami',
                'password' => 'admin',
                'name'     => 'produksi dami',
                'email'    => 'p@dami.com',
                'id_role'=> '3'
            ],
            [
                'username' => 'studio.dami',
                'password' => 'admin',
                'name'     => 'studio dami',
                'email'    => 's@dami.com',
                'id_role'=> '4'
            ]
        ]);
    }
}
