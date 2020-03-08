<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_menus', function (Blueprint $table) {
            $table->unsignedInteger('id_menu');
            $table->unsignedInteger('id_role');
            $table->timestamps();

            $table->foreign('id_menu')->references('id_menu')->on('menus');
            $table->foreign('id_role')->references('id_role')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_menus');
    }
}
