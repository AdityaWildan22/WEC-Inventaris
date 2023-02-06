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
        Schema::create('inv_perbaikan', function (Blueprint $table) {
            $table->increments('id_perbaikan');
            $table->string('kode_barang');
            $table->string('tgl_perbaikan');
            $table->string('kerusakan');
            $table->string('solusi');
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
        Schema::dropIfExists('inv_perbaikan');
    }
};
