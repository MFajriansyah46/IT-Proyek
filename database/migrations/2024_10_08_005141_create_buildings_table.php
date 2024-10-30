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
            $table->id('id_bangunan'); // Kolom ID bangunan
            $table->foreignId('owner_id')->constrained('owners'); // Foreign key yang mengacu pada tabel owners
            $table->string('unit_bangunan'); // Kolom unit bangunan, menggunakan string untuk fleksibilitas
            $table->text('alamat_bangunan'); // Kolom alamat bangunan
            $table->string('gambar_bangunan')->nullable(); // Kolom gambar bangunan, nullable
            $table->text('link_gmap')->nullable(); // Kolom link Google Maps, nullable
            $table->string('token')->unique(); // Kolom token, ditandai sebagai unique
            $table->timestamps(); // Kolom timestamps untuk created_at dan updated_at
            $table->foreign('id_bangunan')->references('id_bangunan')->on('buildings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings'); // Menghapus tabel buildings saat rollback
    }
};
