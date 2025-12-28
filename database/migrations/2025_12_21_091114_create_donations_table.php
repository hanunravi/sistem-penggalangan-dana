<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            
        
            $table->foreignId('campaign_id')->nullable()->constrained('campaigns')->onDelete('set null');

            // Relasi ke User (OPSIONAL)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            // Data Donatur
            $table->string('donatur_name')->nullable(); 
            $table->string('email')->nullable(); 
            $table->boolean('is_anonymous')->default(false); 
            
            // Detail Donasi
            $table->enum('jenis_donasi', ['manual', 'paket', 'campaign'])->default('manual');
            $table->string('kategori_donasi')->nullable(); 
            $table->string('nama_paket')->nullable(); 
            $table->decimal('amount', 15, 0); 
            
            // Pesan & Bukti
            $table->text('message')->nullable();
            
            // Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};