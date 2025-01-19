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
        Schema::create('cascading_data', function (Blueprint $table) {
            $table->id();
            $table->string('dataCascading');
            $table->string('level')->nullable();
            $table->string('tipe')->nullable();
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
        Schema::dropIfExists('cascading_data');
    }
};
