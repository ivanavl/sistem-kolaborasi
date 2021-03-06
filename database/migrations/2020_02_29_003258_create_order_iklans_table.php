<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderIklansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_iklans', function (Blueprint $table) {
            $table->increments('id_order_iklan');
            $table->string('nama_produk', 100);
            $table->integer('jumlah_tayang');
            $table->date('priode_awal');
            $table->date('priode_akhir');
            $table->string('versi_iklan', 100)->nullable();
            $table->date('tanggal_request');
            $table->date('tanggal_konfirmasi')->nullable();
            $table->string('status_order', 50)->default('Requested');
            $table->unsignedInteger('id_kategori');
            $table->unsignedInteger('id_client');
            $table->string('username');
            $table->unsignedInteger('id_jenis_iklan');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
            $table->foreign('id_client')->references('id_client')->on('clients');
            $table->foreign('username')->references('username')->on('users');
            $table->foreign('id_jenis_iklan')->references('id_jenis_iklan')->on('jenis_iklans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_iklans');
    }
}
