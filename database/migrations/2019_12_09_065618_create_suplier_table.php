<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Suplier',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nama_suplier', 50);
            $table->string('alamat_suplier', 50);
            $table->string('no_hp_suplier', 15);
            $table->string('email_suplier', 50);
            $table->string('pj_suplier', 50);
            $table->date('tanggal_suplier');
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
        Schema::dropIfExists('Suplier');
    }
}
