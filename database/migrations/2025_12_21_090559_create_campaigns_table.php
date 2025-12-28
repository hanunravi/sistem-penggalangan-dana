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
            $table->string('title'); // Judul Campaign (Misal: Banjir Demak)
            $table->string('slug')->unique(); // Untuk URL
            $table->text('description')->nullable();
            $table->decimal('target_amount', 15, 0)->default(0); // Target Donasi
            $table->decimal('current_amount', 15, 0)->default(0); // Terkumpul
            $table->string('image')->nullable(); // Foto Bencana
            $table->enum('status', ['active', 'inactive', 'completed'])->default('active');
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
