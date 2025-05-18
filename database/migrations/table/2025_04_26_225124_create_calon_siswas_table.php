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
            $table->unsignedInteger('pembayaran_formulir_id')->nullable();
            $table->unsignedInteger('users_id')->nullable();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir');
            $table->string('agama')->nullable();
            $table->string('email')->unique();
            $table->text('alamat')->nullable();
            $table->string('jalur_masuk');
            $table->string('nisn');
            $table->string('no_hp');
            $table->string('masuk_kelas')->nullable();
            $table->foreignIdFor(JenisKelamin::class, 'jenis_kelamin_id', 32, true);

            // Data orang tua
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('ttl_ayah')->nullable();
            $table->string('ttl_ibu')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('alamat_ortu')->nullable();
            $table->string('no_hp_ayah')->nullable();

            $table->text('ijazah')->nullable();
            $table->text('akta')->nullable();
            $table->text('kk')->nullable();
            $table->text('foto')->nullable();

            // $table->boolean('is_pembayaran_formulir')->nullable();
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
