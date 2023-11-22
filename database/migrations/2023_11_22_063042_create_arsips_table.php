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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id('arsip_id');
            $table->unsignedBigInteger('admin_id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->timestamps();

          $table->foreign('admin_id')->references('admin_id')->on('admin');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
