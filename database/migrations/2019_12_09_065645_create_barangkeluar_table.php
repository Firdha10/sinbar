<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangkeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Keluar',function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_keluar');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('Barang')->onDelete('cascade');
            $table->integer('jumlah_keluar');
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
        Schema::dropIfExists('Keluar');
    }
}
