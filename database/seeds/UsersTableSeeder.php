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
                'role_user'=> 'traffic_iklan'
            ],
            [
                'username' => 'marketing.dami',
                'password' => 'admin',
                'name'     => 'marketing dami',
                'email'    => 'm@dami.com',
                'role_user'=> 'marketing'
            ],
            [
                'username' => 'produksi.dami',
                'password' => 'admin',
                'name'     => 'produksi dami',
                'email'    => 'p@dami.com',
                'role_user'=> 'produksi'
            ],
            [
                'username' => 'studio.dami',
                'password' => 'admin',
                'name'     => 'studio dami',
                'email'    => 's@dami.com',
                'role_user'=> 'studio'
            ]
        ]);
    }
}
