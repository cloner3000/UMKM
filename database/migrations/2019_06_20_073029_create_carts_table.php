<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->foreign( 'user_id')->references('id')
                ->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('produk_id')->unsigned();
            $table->foreign( 'produk_id')->references('id')
                ->on('produks')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('qty');
            $table->string('harga');
            $table->boolean('isCart')->default(true);
            $table->boolean('isPaid')->default(false);
            $table->boolean('isVerify')->default(false);
            $table->boolean('isHandle')->default(false);
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
        Schema::dropIfExists('carts');
    }
}
