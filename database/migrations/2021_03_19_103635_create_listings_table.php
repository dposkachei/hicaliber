<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->float('price');
            $table->tinyInteger('bedrooms')->unsigned()->default(0);
            $table->tinyInteger('bathrooms')->unsigned()->default(0);
            $table->tinyInteger('storeys')->unsigned()->default(0);
            $table->tinyInteger('garages')->unsigned()->default(0);
            $table->tinyInteger('status')->unsigned()->default(1);
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
        Schema::dropIfExists('listings');
    }
}
