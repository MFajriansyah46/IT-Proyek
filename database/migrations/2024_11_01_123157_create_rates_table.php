<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kamar')->constrained('rooms','id_kamar')->indexName('rooms_id_kamar');
            $table->foreignId('id_penyewa')->constrained('tenants')->indexName('rooms_id_tenant');
            $table->integer('rate');
            $table->text('commentary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
