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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();
            $table->string('company_name');
            $table->string('owner_name');
            $table->string('owner_lastname');
            $table->string('vat_number');
            $table->string('street');
            $table->string('zip_code');
            $table->string('city');
            $table->string('country');
            $table->string('owner_email');
            $table->string('owner_phone');
            $table->string('owner_website');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bic_number');
            $table->string('bank_name2')->nullable();
            $table->string('bank_account_number2')->nullable();
            $table->string('bic_number2')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
