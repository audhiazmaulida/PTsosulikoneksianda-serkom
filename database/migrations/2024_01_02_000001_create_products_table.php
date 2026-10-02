<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // Nama Produk
            $table->string('slug')->unique();
            $table->unsignedBigInteger('price');     // Harga Produk, disimpan angka polos (bukan "Rp 70.000")
            $table->text('description')->nullable(); // Deskripsi Singkat (opsional)
            $table->string('photo')->nullable();     // path foto di storage
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};