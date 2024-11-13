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
        Schema::create('shodaqohs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_shodaqoh');
            $table->string('email_shodaqoh');
            $table->date('tanggal_shodaqoh');
            $table->bigInteger('nominal_shodaqoh');
            $table->string('bukti_transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shodaqohs');
    }
};
