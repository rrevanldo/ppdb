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
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nisn');
            $table->string('jk');
            $table->string('nama');
            $table->string('asal_sekolah');
            $table->text('asal_sekolah_text')->nullable();
            $table->string('email');
            $table->string('no_hp');
            $table->string('no_hp_ayah');
            $table->string('no_hp_ibu');
            $table->string('pilih_referensi');
            $table->string('nama_pegawai_wikrama')->nullable();
            $table->string('nama_siswa')->nullable();
            $table->string('rayon')->nullable();
            $table->string('nama_alumni')->nullable();
            $table->string('tahun_lulus_alumni')->nullable();
            $table->string('nama_guru_smp')->nullable();
            $table->string('nama_smp')->nullable();
            $table->string('referensi_no_seleksi')->nullable();
            $table->string('referensi_nama_siswa')->nullable();
            $table->string('referensi_sosmed');
            $table->string('referensi_langsung');
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
        Schema::dropIfExists('ppdbs');
    }
};
