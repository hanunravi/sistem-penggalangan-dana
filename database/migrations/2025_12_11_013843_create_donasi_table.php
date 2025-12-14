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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            
            // Data Donatur
            $table->string('donatur_name')->nullable(); // Bisa kosong jika 'Hamba Allah'
            $table->string('email')->nullable(); // Opsional untuk kirim notif
            $table->boolean('is_anonymous')->default(false); // Ceklis Hamba Allah
            
            // Detail Donasi
            $table->enum('jenis_donasi', ['manual', 'paket'])->default('manual'); // Pembeda
            $table->string('kategori_donasi')->nullable(); // medis, pendidikan, bencana, dll
            $table->string('nama_paket')->nullable(); // Jika pilih paket (Misal: Paket Pangan)
            $table->decimal('amount', 15, 0); // Jumlah uang (15 digit, 0 desimal)
            
            // Pesan & Bukti
            $table->text('message')->nullable();
            $table->string('payment_proof')->nullable(); // Path foto bukti transfer
            
            // Status (Penting untuk Admin)
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