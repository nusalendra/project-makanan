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
        Schema::create('pembeli_pesanan_offline', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembeli_id')->constrained('pembeli')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('pesanan_offline_id')->constrained('pesanan_offline')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('pembeli_pesanan_offline');
    }
};
