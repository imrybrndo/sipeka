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
        Schema::create('sasaran_strategis_surats', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('sasaranStrategis');
            // $table->integer('idTujuan');
            $table->integer('idSurat');
            $table->integer('idPd');
            $table->float('nilai');
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
        Schema::dropIfExists('sasaran_strategis_surats');
    }
};
