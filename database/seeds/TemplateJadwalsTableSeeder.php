<?php

use Illuminate\Database\Seeder;

class TemplateJadwalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_jadwals')->insert([
            ['nama_template' => 'Basic template spot iklan',
             'id_jenis_iklan' => '1'
            ],
            ['nama_template' => 'Basic template talkshow',
             'id_jenis_iklan' => '2'
            ],
            ['nama_template' => 'BAT talkshow',
             'id_jenis_iklan' => '2'
            ]
        ]);

        DB::table('isi_templates')->insert([
            //Spot Iklan
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '04:54:00',
                'durasi_template'  => '6'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '05:25:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '05:55:00',
                'durasi_template'  => '6'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '07:24:00',
                'durasi_template'  => '6'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '08:25:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '08:40:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '09:40:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '09:55:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '10:40:00',
                'durasi_template'  => '6'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '10:54:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '12:05:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '12:25:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '13:28:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '13:55:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '14:35:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '14:55:00',
                'durasi_template'  => '6'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '15:55:00',
                'durasi_template'  => '6'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '16:20:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '16:40:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '17:43:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '18:05:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '18:25:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '18:54:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '19:52:00',
                'durasi_template'  => '9'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '20:52:00',
                'durasi_template'  => '9'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '21:52:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '22:52:00',
                'durasi_template'  => '6'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '23:16:00',
                'durasi_template'  => '5'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '23:37:00',
                'durasi_template'  => '4'
            ],
            [
                'nama_template' => 'Basic template spot iklan',
                'jam_awal'      => '23:57:00',
                'durasi_template'  => '3'
            ],

            //Talkshow
            [
                'nama_template' => 'Basic template talkshow',
                'jam_awal'      => '07:30:00',
                'durasi_template'  => '25'
            ],
            [
                'nama_template' => 'Basic template talkshow',
                'jam_awal'      => '08:00:00',
                'durasi_template'  => '25'
            ],
            [
                'nama_template' => 'Basic template talkshow',
                'jam_awal'      => '08:45:00',
                'durasi_template'  => '25'
            ],
            [
                'nama_template' => 'Basic template talkshow',
                'jam_awal'      => '09:15:00',
                'durasi_template'  => '25'
            ],
            [
                'nama_template' => 'Basic template talkshow',
                'jam_awal'      => '12:30:00',
                'durasi_template'  => '25'
            ],
            [
                'nama_template' => 'Basic template talkshow',
                'jam_awal'      => '13:00:00',
                'durasi_template'  => '25'
            ],
            [
                'nama_template' => 'Basic template talkshow',
                'jam_awal'      => '16:45:00',
                'durasi_template'  => '25'
            ],
            [
                'nama_template' => 'Basic template talkshow',
                'jam_awal'      => '17:15:00',
                'durasi_template'  => '25'
            ]
        ]);
    }
}
