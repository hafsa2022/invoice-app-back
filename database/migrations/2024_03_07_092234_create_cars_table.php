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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('chassisNumber', 17);
            $table->string('brand');
            $table->string('model');
            $table->string('carType');
            $table->string('transmission');
            $table->dateTime('firstRegistration');
            $table->integer('mileage');
            $table->integer('enginePower');
            $table->integer('cylinder');
            $table->string('fuel');
            $table->string('co2', 5);
            $table->string('color');
            $table->integer('numberKeys');
            $table->tinyInteger('cerOfConf');
            $table->tinyInteger('inspectionForm');
            $table->tinyInteger('carPass');
            $table->tinyInteger('registerCert');
            $table->timestamps();
            $table->unsignedBigInteger('compagny_id');
            $table->foreign('compagny_id')->references('id')->on('settings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
