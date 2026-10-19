<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->text('sejarah');
            $table->text('visi');
            $table->text('misi');              // satu misi per baris
            $table->text('sambutan');
            $table->string('nama_direktur');
            $table->string('jabatan_direktur');
            $table->string('foto_tentang')->nullable();
            $table->string('foto_direktur')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_perusahaans');
    }
};