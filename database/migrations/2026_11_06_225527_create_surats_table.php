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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_tiket')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('jenis_surat');
            $table->string('nik_pemohon', 16);
            $table->string('nama_pemohon');
            $table->text('keperluan');
            $table->enum('status', ['Pending', 'Diproses', 'Selesai', 'Ditolak']);
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};