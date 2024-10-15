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
            $table->string('no_kamar');
            $table->integer('harga_kamar');
            $table->integer('kecepatan_internet');
            $table->decimal('rating_kamar');

            // $table->foreignId('id_bangunan')->constrained('buildings')->onDelete('cascade'); // Pastikan ini sesuai
            // $table->string('room_number'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
