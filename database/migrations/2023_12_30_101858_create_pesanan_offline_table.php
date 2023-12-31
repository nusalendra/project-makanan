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
        Schema::create('pesanan_offline', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tambahmakanan_id')->constrained('tambahmakanan')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('qty');
            $table->string('menu');
            $table->integer('harga');
            $table->string('status_pesanan');
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
        Schema::dropIfExists('pesanan_offline');
    }
};
