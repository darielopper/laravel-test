<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('coffeetype_id');
            $table->unsignedInteger('coffeesize_id');
            $table->float('price', 4, 2);
            $table->timestamps();

            $table->foreign('coffeetype_id')->references('id')->on('coffeetypes');
            $table->foreign('coffeesize_id')->references('id')->on('coffeesizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
