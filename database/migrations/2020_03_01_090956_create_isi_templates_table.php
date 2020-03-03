<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi_templates', function (Blueprint $table) {
            $table->string('nama_template');
            $table->time('jam_awal');
            $table->integer('jumlah_iklan');
            $table->timestamps();

            $table->foreign('nama_template')->references('nama_template')->on('template_jadwals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isi_templates');
    }
}
