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
        Schema::create('pemesananoffline', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('nama_pembeli')->nullable();
            $table->string('menu_offline');
            $table->integer('qty_offline');
            $table->integer('harga_offline');
            $table->string('status_offline')->nullable();
            $table->integer('status_pesanan')->nullable();
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
        Schema::dropIfExists('pemesananoffline');
    }
};
