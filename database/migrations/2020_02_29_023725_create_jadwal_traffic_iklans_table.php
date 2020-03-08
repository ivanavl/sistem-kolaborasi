<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTrafficIklansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_traffic_iklans', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal');
            $table->date('tanggal_jadwal');
            $table->time('jam_jadwal');
            $table->unsignedInteger('prev')->nullable();
            $table->unsignedInteger('next')->nullable();
            $table->unsignedInteger('id_jenis_iklan');
            $table->unsignedInteger('id_order_iklan')->nullable();
            $table->timestamps();
            
            $table->foreign('id_jenis_iklan')->references('id_jenis_iklan')->on('jenis_iklans');
            $table->foreign('id_order_iklan')->references('id_order_iklan')->on('order_iklans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_traffic_iklans');
    }
}
