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
        Schema::create('perencanaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id');
            $table->foreignId('Dokumen_id');
            $table->integer('edisi');
            $table->date('tanggal_upload');
            $table->date('tanggal_pengesahan');
            $table->string('dokumen');
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
        Schema::dropIfExists('perencanaans');
    }
};
