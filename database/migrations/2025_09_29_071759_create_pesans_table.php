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
    Schema::create('pesans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemesan');
        $table->string('jenis_kelamin');
        $table->string('nomor_identitas', 16);
        $table->string('tipe_kamar');
        $table->date('tanggal_pesan');
        $table->integer('durasi');
        $table->boolean('breakfast')->default(false);
        $table->integer('total_harga');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
