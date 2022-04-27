<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksimeeting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksimeeting', function (Blueprint $table) {
          $table->increments('id');
          $table->string('jobsite')->nullable();
          $table->string('nama_meeting')->nullable();
          $table->string('jenis_meeting')->nullable();
          $table->string('tempat')->nullable();
          $table->date('tanggal')->nullable();
          $table->time('waktu')->nullable();
          $table->time('hour')->nullable();
          $table->string('pemimpin')->nullable();
          $table->string('notulen')->nullable();
          $table->string('snack')->nullable();
          $table->string('agenda')->nullable();
          $table->string('notes')->nullable();
          $table->string('peserta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
