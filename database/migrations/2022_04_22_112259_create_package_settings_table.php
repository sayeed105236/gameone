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
        Schema::create('package_settings', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('package_name');
            $table->string('package_qty');
            $table->string('amount');
            $table->string('package_price');
            $table->string('affilate_token');
            $table->string('daily_seller_token');
            $table->string('daily_buyer_token');
            $table->string('duration');

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
        Schema::dropIfExists('package_settings');
    }
};
