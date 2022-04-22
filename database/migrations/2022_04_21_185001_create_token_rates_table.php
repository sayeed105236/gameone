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
        Schema::create('token_rates', function (Blueprint $table) {
            $table->id();
            $table->string('token_convert_rate');
            $table->string('buying_commission');
            $table->string('selling_commission');
            $table->string('buy_limit_max');
            $table->string('buy_limit_min');
            $table->string('sell_limit_max');
            $table->string('sell_limit_min');

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
        Schema::dropIfExists('token_rates');
    }
};
