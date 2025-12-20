<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Berita
            $table->string('slug')->unique(); // Untuk link URL (contoh: kabar-lapangan-hari-ini)
            $table->string('image')->nullable(); // Foto Utama
            $table->longText('content'); // Isi Berita (Pakai longText agar muat banyak)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
