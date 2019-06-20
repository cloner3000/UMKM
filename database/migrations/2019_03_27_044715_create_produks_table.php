<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('umkm_id')->unsigned();
            $table->foreign( 'umkm_id')->references('id')
                ->on('umkm')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('nama');
            $table->string('short_desc');
            $table->text('long_desc');
            $table->string('keyword');
            $table->string('kategori_ids');
            $table->double('harga');
            $table->string('persediaan')->default(0);
            $table->boolean('purchase_order')->default(false);
            $table->text('pic1')->nullable();
            $table->text('pic2')->nullable();
            $table->string('status');
            $table->double('rating')->nullable();
            $table->boolean('isHide')->default(false);
            $table->boolean('isDiscount')->default(false);
            $table->string('discount')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('produks');
    }
}
