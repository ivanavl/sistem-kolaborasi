<?php

use Illuminate\Database\Seeder;

class RolesMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_menus')->insert([
            [
                'id_role'=> '1',
                'id_menu' => '1'
            ],
            [
                'id_role'=> '1',
                'id_menu' => '2'
            ],
            [
                'id_role'=> '1',
                'id_menu' => '3'
            ],
            [
                'id_role'=> '1',
                'id_menu' => '4'
            ],
            [
                'id_role'=> '1',
                'id_menu' => '5'
            ],
            [
                'id_role'=> '1',
                'id_menu' => '6'
            ],
            [
                'id_role'=> '1',
                'id_menu' => '7'
            ],
            [
                'id_role'=> '1',
                'id_menu' => '8'
            ],
            [
                'id_role'=> '2',
                'id_menu' => '5'
            ],
            [
                'id_role'=> '2',
                'id_menu' => '6'
            ],
            [
                'id_role'=> '3',
                'id_menu' => '7'
            ],
            [
                'id_role'=> '4',
                'id_menu' => '8'
            ]
        ]);
    }
}
