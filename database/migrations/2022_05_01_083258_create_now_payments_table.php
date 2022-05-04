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
        Schema::create('now_payments', function (Blueprint $table) {
            $table->id();
            $table->string('paymentID')->nullable();
            $table->string('status')->nullable();
            $table->string('pay_address')->nullable();
            $table->string('price_amount')->nullable();
            $table->string('price_currency')->nullable();
            $table->string('pay_amount')->nullable();
            $table->string('amount_received')->nullable();
            $table->string('pay_currency')->nullable();
            $table->string('order_id')->nullable();
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
        Schema::dropIfExists('now_payments');
    }
};
