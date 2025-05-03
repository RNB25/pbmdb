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
        Schema::create('pembayaran_formulir_m', function (Blueprint $table) {
            $table->id();
            $table->aktif();
            $table->unsignedBigInteger('users_id');
            $table->integer('jumlah_harga')->default(0);
            $table->string('metode_pembayaran')->nullable();
            $table->boolean('is_lunas')->default(false);
            $table->timestamp('tanggal_bayar')->nullable();
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();
            $table->users();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_formulir_m');
    }
};
