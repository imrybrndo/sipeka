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
            $table->string('indikatorKinerja');
            $table->string('satuan');
            $table->string('target');
            $table->string('idSasaran');
            $table->string('idSurat');
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
        Schema::dropIfExists('indikator_surats');
    }
};
