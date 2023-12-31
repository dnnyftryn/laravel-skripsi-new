<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang')->nullable();
            $table->string('nama_kategori');
            $table->string('deskripsi')->nullable();
            $table->integer('jumlah')->nullable()->default(0);
            $table->string('harga_jual')->nullable();
            $table->string('harga_beli')->nullable();
            $table->string('rating')->nullable();
            $table->string('satuan')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
