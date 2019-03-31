<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_item', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')
                ->on('menu');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')
                ->on('roles');
            $table->boolean('akses');
            $table->boolean('insert');
            $table->boolean('update');
            $table->boolean('delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_item');
    }
}
