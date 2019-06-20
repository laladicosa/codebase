<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bedroom')->unsigned()->nullable();
            $table->integer('bathroom')->unsigned()->nullable();
            $table->integer('living_room')->unsigned()->nullable();
            $table->integer('kitchen')->unsigned()->nullable();
            $table->integer('patio')->unsigned()->nullable();
            $table->integer('garage')->unsigned()->nullable();
            $table->integer('garden')->unsigned()->nullable();
            $table->integer('swimming_pool')->unsigned()->nullable();
            $table->integer('toilet')->unsigned()->nullable();
            $table->integer('house_id')->unsigned()->nullable();
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
        Schema::dropIfExists('features');
    }
}
