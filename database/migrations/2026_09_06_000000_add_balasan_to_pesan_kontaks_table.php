<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pesan_kontaks', function (Blueprint $table) {
            $table->text('balasan')->nullable()->after('sudah_dibaca');
            $table->timestamp('dibalas_pada')->nullable()->after('balasan');
            $table->string('lampiran')->nullable()->after('dibalas_pada');
        });
    }

    public function down(): void
    {
        Schema::table('pesan_kontaks', function (Blueprint $table) {
            $table->dropColumn(['balasan', 'dibalas_pada', 'lampiran']);
        });
    }
};