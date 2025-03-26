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
        Schema::create('zakats', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_zakat');
            $table->string('nama');
            $table->text('alamat');
            $table->string('jenis_zakat')->default('bawa_sendiri');
            $table->decimal('harga_per_zakat', 10, 2)->nullable();
            $table->decimal('harga_total', 10, 2)->nullable();
            $table->string('jumlah_zakat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zakats');
    }
};
