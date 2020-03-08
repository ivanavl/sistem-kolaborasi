<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            ['nama_menu' => 'Home',
             'route_name'=> 'home'
            ],
            ['nama_menu' => 'Create Jadwal',
             'route_name'=> '/createjadwal'
            ],
            ['nama_menu' => 'Lihat Jadwal',
             'route_name'=> '/lihatjadwal'
            ],
            ['nama_menu' => 'Konfirmasi Booking',
             'route_name'=> '/konfirmasibooking'
            ],
            ['nama_menu' => 'Cari Jadwal Kosong',
             'route_name'=> '/carijadwal'
            ],
            ['nama_menu' => 'Lihat Request',
             'route_name'=> '/lihatrequest'
            ],
            ['nama_menu' => 'Update Versi Iklan',
             'role_name' => '/updateversi'
            ],
            ['nama_menu' => 'Lihat Jadwal Final',
             'role_menu' => '/lihatjadwalfinal'
            ]
        ]);
    }
}
