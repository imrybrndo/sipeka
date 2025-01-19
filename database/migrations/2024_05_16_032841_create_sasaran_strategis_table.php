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
        Schema::create('sasaran_strategis', function (Blueprint $table) {
            $table->id('key');
            $table->string('name');
            $table->integer('parent');
            $table->string('indikator')->nullable();
            $table->string('croscut')->nullable();
            $table->integer('idPd');
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
        Schema::dropIfExists('sasaran_strategis');
    }
};
