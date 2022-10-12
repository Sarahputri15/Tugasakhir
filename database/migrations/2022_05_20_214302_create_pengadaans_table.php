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
        Schema::create('pengadaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id');
            $table->string('nomor_kontrak');
            $table->string('judul');
            $table->date('awal');
            $table->date('akhir');
            $table->string('penyedia');
            $table->integer('nilai_kontrak');
            $table->string('akun');
            $table->string('status')->nullable()->default('Belum terdaftar');
            $table->string('alamat');
            $table->string('bank');
            $table->string('no_NPWP')->nullable();
            $table->string('no_rekening')->nullable();
            $table->integer('realisasi_pekerjaan')->nullable();
            $table->integer('realisasi_pembayaran')->nullable();
            $table->string('sp2d')->nullable();
            $table->string('nilai_sp2d')->nullable();
            $table->string('dokumen_perpajakan')->nullable();
            $table->string('Dokumen_Judul')->nullable();
            $table->string('Resume_kontrak')->nullable();
            $table->string('Adendum')->nullable();
            $table->string('NPWP')->nullable();
            $table->string('Dokumen_Rekening')->nullable();
            $table->string('Berita_Acara_Pemeriksaan')->nullable();
            $table->string('Berita_Acara_Administrasi')->nullable();
            $table->string('Berita_Acara_Pembayaran')->nullable();
            $table->string('dok_pemeliharaan')->nullable();
            $table->string('jaminan_pelaksanaan_pekerjaan')->nullable();
            $table->string('jaminan_uang_muka')->nullable();
            $table->string('dok_akhir_tahun')->nullable();
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
        Schema::dropIfExists('pengadaans');
    }
};
