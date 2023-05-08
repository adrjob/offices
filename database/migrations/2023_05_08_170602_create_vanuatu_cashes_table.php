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
        Schema::create('vanuatu_cashes', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('spend')->nullable();
            $table->string('receive');
            $table->string('status');
            $table->string('user_id');
            $table->string('dubaiPath');
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
        Schema::dropIfExists('vanuatu_cashes');
    }
};
