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
            $table->foreignId('id_bangunan')->constrained('buildings', 'id_bangunan')->indexName('rooms_id_bangunan');
            $table->char('no_kamar');
            $table->bigInteger('harga_kamar');
            $table->float('kecepatan_internet');
            $table->string('gambar_kamar')->nullable();
            $table->text(column: 'deskripsi')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
}