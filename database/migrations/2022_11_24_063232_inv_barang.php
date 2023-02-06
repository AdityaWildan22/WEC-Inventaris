<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->integer('id_kat');
            $table->string('kd_barang');
            $table->string('nm_barang');
            $table->string('harga');
            $table->string('tgl_pembelian');
            $table->string('tempat');
            $table->string('status');
            $table->text('ket');
            $table->text('foto');
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
        Schema::dropIfExists('inv_barang');
    }
};
