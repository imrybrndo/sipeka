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
        Schema::create('indikator_surats', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('indikatorKinerja');
            $table->string('satuan');
            $table->string('target');
            $table->integer('idSasaran');
            $table->integer('idSurat');
            $table->integer('idPd');
            $table->float('triwulan1')->nullable();
            $table->float('triwulan2')->nullable();
            $table->float('triwulan3')->nullable();
            $table->float('triwulan4')->nullable();
            $table->float('nilai')->nullable();
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
        Schema::dropIfExists('indikator_surats');
    }
};
