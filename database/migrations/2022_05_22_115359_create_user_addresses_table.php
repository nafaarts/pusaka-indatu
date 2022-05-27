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
        // USER ID
        // ADDRESS LINE
        // DISTRICT
        // CITY
        // CITY_ID
        // PROVINCE
        // POSTAL CODE
        // COUNTRY
        // PHONE
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('address_line');
            $table->string('district');
            $table->string('city');
            $table->integer('city_id');
            $table->string('province');
            $table->string('postal_code');
            $table->string('country');
            $table->string('phone');
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
        Schema::dropIfExists('user_addresses');
    }
};
