<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('STO');
            $table->string('PD_NAME');
            $table->string('F_OLT');
            $table->string('LATITUDE');
            $table->string('LONGITUDE');
            $table->double('IS_AVAI');
            $table->double('IS_BLOCKING');
            $table->double('IS_OTHERS');
            $table->double('IS_RESERV');
            $table->double('IS_SERVICE');
            $table->double('IS_TOTAL');
            $table->double('OCC')->nullable();
            $table->string('OCC_COLOR')->nullable();
            $table->string('OLT');
            $table->string('MODUL');
            $table->string('MERK_OLT');
            $table->string('STATUS');
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
        Schema::dropIfExists('odps');
    }
}
