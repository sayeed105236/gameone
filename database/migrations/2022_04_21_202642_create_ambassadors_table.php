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
        Schema::create('ambassadors', function (Blueprint $table) {
            $table->id();
            $table->string('auser_qty');
            $table->string('refer_token_value');
            $table->string('owner_token_value');
            $table->string('token_bonus');
            $table->string('cash_bonus');
            $table->string('duration');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('ambassadors');
    }
};
