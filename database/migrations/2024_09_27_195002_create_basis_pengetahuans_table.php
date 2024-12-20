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
        Schema::create('basis_pengetahuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpenyakit');
            $table->unsignedBigInteger('idgejala');
            $table->unsignedBigInteger('idmb');
            $table->unsignedBigInteger('idmd');
            $table->timestamps();

            $table->foreign('idpenyakit')->references('id')->on('penyakits')->onDelete('cascade');
            $table->foreign('idgejala')->references('id')->on('gejalas')->onDelete('cascade');
            $table->foreign('idmb')->references('id')->on('nilais')->onDelete('cascade');
            $table->foreign('idmd')->references('id')->on('nilais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basis_pengetahuans');
    }
};
