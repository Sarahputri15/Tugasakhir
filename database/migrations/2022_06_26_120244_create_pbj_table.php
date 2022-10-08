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
        Schema::create('pbj', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahun_id');
            $table->string('paket')->unique();
            $table->string('rup')->nullable();
            $table->string('mak');
            $table->integer('pagu');
            $table->string('metode');
            $table->string('rab')->nullable();
            $table->string('hps')->nullable();
            $table->string('kak')->nullable();
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
        Schema::dropIfExists('pbj');
    }
};
