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
        Schema::create('tambahmakanan', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('no_produk');
            $table->string('nama_prdk');
            $table->string('komposisi');
            $table->integer('kuota');
            $table->bigInteger('harga');
            $table->string('images');
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
        Schema::dropIfExists('tambahmakanan');
    }
};