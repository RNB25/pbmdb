<?php

use App\Models\JenisKelamin;
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
        Schema::create('calon_siswa_t', function (Blueprint $table) {
            $table->id();
            $table->aktif();
            $table->string('nama_siswa');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat');
            $table->string('no_hp');
            $table->date('tanggal_lahir');
            $table->foreignIdFor(JenisKelamin::class, 'jenis_kelamin_id', 32, true);
            $table->string('nama_ortu');
            $table->string('sekolah_asal');
            $table->users();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_siswa_t');
    }
};
