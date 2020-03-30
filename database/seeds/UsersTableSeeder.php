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
                'password' => Hash::make('password'),
                'name'     => 'traffic iklan dami',
                'email'    => 'tf@dami.com',
                'role_id'=> '1'
            ],
            [
                'username' => 'marketing.dami',
                'password' => Hash::make('password'),
                'name'     => 'marketing dami',
                'email'    => 'm@dami.com',
                'role_id'=> '2'
            ],
            [
                'username' => 'produksi.dami',
                'password' => Hash::make('password'),
                'name'     => 'produksi dami',
                'email'    => 'p@dami.com',
                'role_id'=> '3'
            ],
            [
                'username' => 'studio.dami',
                'password' => Hash::make('password'),
                'name'     => 'studio dami',
                'email'    => 's@dami.com',
                'role_id'=> '4'
            ]
        ]);
    }
}
