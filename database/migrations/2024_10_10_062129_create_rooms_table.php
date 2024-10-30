<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->foreignId('id_bangunan')->constrained('buildings', 'id_bangunan')->indexName('rooms_id_bangunan');
            $table->integer('room_number');
            $table->bigInteger('price');
            $table->integer('internet_speed');
            $table->string('images')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
}
