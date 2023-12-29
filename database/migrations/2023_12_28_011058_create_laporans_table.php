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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lokasi_id')->constrained()->cascadeOnDelete;
            $table->foreignId('user_id')->constrained()->cascadeOnDelete;
            $table->enum('waktu', ['pagi', 'sore', 'malam'])->default('pagi');
            $table->enum('lingkungan', ['aman', 'tidak aman'])->default('aman');
            $table->enum('bbm', ['aman', 'tidak aman'])->default('aman');
            $table->enum('perangkat', ['aman', 'tidak aman'])->default('aman');
            $table->enum('apar', ['aman', 'tidak aman'])->default('aman');
            $table->enum('apd', ['aman', 'tidak aman'])->default('aman');
            $table->enum('cuaca', ['cerah', 'mendung', 'hujan ringan', 'hujan berat'])->default('cerah');
            $table->enum('pln', ['on', 'off'])->default('on');
            $table->enum('genset', ['on', 'off'])->default('off');
            $table->enum('gedung', ['normal', 'bocor', 'rusak'])->default('normal');
            $table->string('ev_lingkungan')->nullable();
            $table->string('ev_gedung')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
