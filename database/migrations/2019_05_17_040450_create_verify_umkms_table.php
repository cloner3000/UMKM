<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyUmkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verify_umkm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('umkm_id')->unsigned();
            $table->foreign( 'umkm_id')->references('id')
                ->on('umkm')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->text('note')->nullable();
            $table->text('bukti');
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
        Schema::dropIfExists('verify_umkms');
    }
}
