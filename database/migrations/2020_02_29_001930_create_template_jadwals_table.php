<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_jadwals', function (Blueprint $table) {
            $table->increments('id_template');
            $table->string('nama_template')->unique();
            $table->unsignedInteger('id_jenis_iklan');
            $table->timestamps();

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
        Schema::dropIfExists('template_jadwals');
    }
}
