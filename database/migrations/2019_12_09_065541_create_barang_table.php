<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Barang',function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_barang');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
            $table->integer('stok_barang');
            $table->string('harga_barang');
            $table->date('tgl_masuk_barang');
            $table->date('expired_barang');
            $table->string('foto_barang');
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
        Schema::dropIfExists('Barang');
    }
}
