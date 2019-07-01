<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->foreign( 'user_id')->references('id')
                ->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('avatar')->nullable();
            $table->string('nama');
            $table->text('desc');
            $table->date('tgl_berdiri');
            $table->string('nama_pemilik');
            $table->string('nik_pemilik');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('lat');
            $table->string('long');
            $table->string('jenis_id');
            $table->string('aset');
            $table->string('omset');
            $table->string('no_siup');
            $table->date('tgl_siup');
            $table->date('tgl_siup_exp');
            $table->string('npwp');
            $table->string('tdp')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->date('tgl_tdp');
            $table->date('tgl_tdp_exp');
            $table->string('izin_ganguan')->nullable();
            $table->date('tgl_izin_ganguan');
            $table->text('akta_notaris')->nullable();
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
        Schema::dropIfExists('umkms');
    }
}
