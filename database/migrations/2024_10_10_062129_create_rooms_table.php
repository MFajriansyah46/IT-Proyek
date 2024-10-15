<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('id_kamar');
            $table->integer('no_kamar');
            $table->bigInteger('harga_kamar');
            $table->integer('kecepatan_internet');
            // $table->foreignId('id_bangunan')->constrained('buildings')->onDelete('cascade'); // Pastikan ini sesuai
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
