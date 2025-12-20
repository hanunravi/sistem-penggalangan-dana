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
    Schema::create('campaigns', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Judul Bencana
        $table->string('image'); // Nama file foto
        $table->integer('target_dana'); // Target Rp
        $table->text('description'); // Isi berita/deskripsi
        $table->enum('status', ['aktif', 'selesai'])->default('aktif');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
