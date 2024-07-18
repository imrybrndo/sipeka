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
        Schema::create('realisasis', function (Blueprint $table) {
            $table->id();
            $table->string('sasaranStrategis');
            $table->string('indikator');
            $table->string('nilai');
            $table->string('target');
            $table->string('realisasi');
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
        Schema::dropIfExists('realisasis');
    }
};
