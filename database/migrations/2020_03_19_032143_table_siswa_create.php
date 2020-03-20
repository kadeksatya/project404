<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableSiswaCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis')->nullable();
            $table->unsignedInteger('id_users');
            $table->string('kelas')->nullable();
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
