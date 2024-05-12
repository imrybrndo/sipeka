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
        Schema::create('indikator_tujuans', function (Blueprint $table) {
            $table->id();
            $table->string('indikatorTujuan');
            $table->string('idSurat');
            $table->string('idPengguna');
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
        Schema::dropIfExists('indikator_tujuans');
    }
};
