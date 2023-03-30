<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGanttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gantts', function (Blueprint $table) {
            $table->string('task_id')->primary();
            $table->string('task_name');
            $table->string('resource');
            $table->integer('tgl_mulai');
            $table->integer('bln_mulai');
            $table->integer('thn_mulai');
            $table->integer('tgl_selesai');
            $table->integer('bln_selesai');
            $table->integer('thn_selesai');
            $table->integer('duration')->nullable();
            $table->integer('percent');
            $table->string('dependencies')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('proyeks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gantts');
    }
}
