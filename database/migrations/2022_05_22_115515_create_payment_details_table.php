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
        // ORDER ID
        // AMOUNT
        // PAYMENT METHOD
        // PAYMENT RESPONSE
        // STATUS [ PENDING, FAIL, SUCCESS ]
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('order_details')->onDelete('cascade');
            $table->integer('amount');
            $table->string('payment_method');
            $table->json('payment_response');
            $table->string('status');
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
        Schema::dropIfExists('payment_details');
    }
};
