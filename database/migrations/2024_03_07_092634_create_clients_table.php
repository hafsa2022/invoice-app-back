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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->boolean('isCompany');
            $table->string('surname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('companyName')->nullable();
            $table->string('btwNumber')->nullable();
            $table->string('street');
            $table->string('postalCode');
            $table->string('city');
            $table->string('country');
            $table->string('email')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('mobilenumber')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
