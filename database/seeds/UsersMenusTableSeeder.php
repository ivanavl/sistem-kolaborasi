<?php

use Illuminate\Database\Seeder;

class UsersMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_menus')->insert([
            [
                'role_user'=> 'traffic_iklan',
                'id_menu' => '1'
            ],
            [
                'role_user'=> 'traffic_iklan',
                'id_menu' => '2'
            ],
            [
                'role_user'=> 'traffic_iklan',
                'id_menu' => '3'
            ],
            [
                'role_user'=> 'traffic_iklan',
                'id_menu' => '4'
            ],
            [
                'role_user'=> 'traffic_iklan',
                'id_menu' => '5'
            ],
            [
                'role_user'=> 'traffic_iklan',
                'id_menu' => '6'
            ],
            [
                'role_user'=> 'traffic_iklan',
                'id_menu' => '7'
            ],
            [
                'role_user'=> 'traffic_iklan',
                'id_menu' => '8'
            ],
            [
                'role_user'=> 'marketing',
                'id_menu' => '5'
            ],
            [
                'role_user'=> 'marketing',
                'id_menu' => '6'
            ],
            [
                'role_user'=> 'produksi',
                'id_menu' => '7'
            ],
            [
                'role_user'=> 'studio',
                'id_menu' => '8'
            ]
        ]);
    }
}
