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
        Schema::create('realisasi_anggarans', function (Blueprint $table) {
            $table->id();
            $table->integer('idProgram')->unique();
            $table->string('realisasiFisik');
            $table->string('triwulan1');
            $table->string('triwulan2');
            $table->string('triwulan3');
            $table->string('triwulan4');
            $table->string('anggaran');
            $table->float('nilai');
            $table->string('idPd');
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
        Schema::dropIfExists('realisasi_anggarans');
    }
};
