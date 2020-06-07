<?php

use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Lain-Lain'],
            ['nama_kategori' => 'Motivasi'],
            ['nama_kategori' => 'Acara'],
            ['nama_kategori' => 'Berita'],
            ['nama_kategori' => 'Program'],
            ['nama_kategori' => 'Rehab'],
            ['nama_kategori' => 'Otomotif'],
            ['nama_kategori' => 'Kasur'],
            ['nama_kategori' => 'Pendidikan'],
            ['nama_kategori' => 'Gereja'],
            ['nama_kategori' => 'Perhiasan'],
            ['nama_kategori' => 'Les/Kursus'],
            ['nama_kategori' => 'Olahraga'],
            ['nama_kategori' => 'Bank'],
            ['nama_kategori' => 'Resto'],
            ['nama_kategori' => 'Aksesoris'],
            ['nama_kategori' => 'Penyewaan Tempat'],
            ['nama_kategori' => 'Pemakaman'],
            ['nama_kategori' => 'Kesehatan'],
            ['nama_kategori' => 'Pelatihan'],
            ['nama_kategori' => 'Himbauan'],
            ['nama_kategori' => 'Air Minum'],
        ]);
    }
}
