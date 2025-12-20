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
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke Campaign (Tipe BigInt Unsigned)
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');

            // Relasi ke User (BigInt Unsigned - Opsional jika donatur login)
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            // Data Donatur
            $table->string('donatur_name')->nullable(); 
            $table->string('email')->nullable(); 
            $table->boolean('is_anonymous')->default(false); 
            
            // Detail Donasi
            $table->enum('jenis_donasi', ['manual', 'paket'])->default('manual');
            $table->string('kategori_donasi')->nullable(); 
            $table->string('nama_paket')->nullable(); 
            $table->decimal('amount', 15, 0); 
            
            // Pesan & Bukti
            $table->text('message')->nullable();
            $table->string('payment_proof')->nullable(); 
            
            // Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};