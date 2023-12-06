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
            $table->increments('id');
            $table->string('nama_pembeli');
            $table->string('menu_offline');
            $table->integer('qty_offline');
            $table->integer('harga_offline');
            $table->string('status_offline')->nullable();
            $table->integer('status_pesanan');
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
