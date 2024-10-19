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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id('id_bangunan'); 
            $table->foreignId('owner_id')->constrained(
                table: 'owners',
                indexName: 'buildings_owner_id'
            );
            $table->char('unit_bangunan');
            $table->text ('alamat_bangunan');
            $table->string('gambar_bangunan')->nullable();
            $table->text('link_gmap')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};