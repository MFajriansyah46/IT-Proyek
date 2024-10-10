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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('id_kamar'); // ID unik untuk kamar
            // $table->unsignedBigInteger('id_bangunan'); // ID yang berhubungan dengan tabel bangunan
            $table->string('no_kamar'); // Nomor kamar
            $table->decimal('harga_kamar', 10, 2); // Harga kamar, dengan format desimal
            $table->integer('kecepatan_internet'); // Kecepatan internet dalam Mbps
            $table->decimal('rating_kamar', 3, 2); // Rating kamar (misalnya 4.75)

            $table->timestamps();

            // // Foreign key constraint (hubungan dengan tabel bangunan jika ada)
            // $table->foreign('id_bangunan')->references('id')->on('buildings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};