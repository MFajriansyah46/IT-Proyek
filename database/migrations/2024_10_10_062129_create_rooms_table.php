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
            // $table->foreignId('id_bangunan')->constrained('buildings')->onDelete('cascade'); // Pastikan ini sesuai
            $table->string('no_kamar'); 
            $table->string('harga_kamar'); 
            $table->string('kecepatan_internet'); 
            $table->string('rating_kamar'); 
            $table->binary('gambar_kamar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
