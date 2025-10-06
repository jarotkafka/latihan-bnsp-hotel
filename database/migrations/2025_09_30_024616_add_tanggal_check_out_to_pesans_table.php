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
        Schema::table('pesans', function (Blueprint $table) {
            $table->date('tanggal_check_out')->nullable()->after('tanggal_pesan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesans', function (Blueprint $table) {
            $table->dropColumn('tanggal_check_out');
        });
    }
};
