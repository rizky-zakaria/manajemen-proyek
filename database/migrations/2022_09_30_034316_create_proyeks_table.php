<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_proyek');
            $table->string('lokasi');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->string('file');
            $table->string('status');
            $table->integer('anggaran');
            $table->string('jenis');
            $table->string('bidang');
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
        Schema::dropIfExists('proyeks');
    }
}
