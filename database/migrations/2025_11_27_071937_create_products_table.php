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
        Schema::create('products', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->timestamps();
            $table->integer('price'); // Harga satuan
            $table->integer('quantity'); // stock
            $table->string('brand'); // merk
            $table->text('description'); // deskripsi
            $table->string('size'); // ukuran
            $table->string('sch'); // sch
            $table->string('hs_code'); // kode hs
            $table->string('country_origin'); // origin
            $table->string('material_family'); // material
            $table->boolean('sni_required')->default(false); // butuh sni
            $table->string('size_category'); // kategori ukuran
            $table->boolean('lartas_required')->default(false); // butuh lartas
            $table->enum('type', ['materials', 'chemicals', 'raw-parts', 'consumables']); //type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
