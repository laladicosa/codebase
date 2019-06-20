<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->string('address');
            $table->string('image')->nullable();
            $table->string('image_two')->nullable();
            $table->string('image_three')->nullable();
            $table->bigInteger('price')->unsigned();
            $table->decimal('width')->unsigned();
            $table->decimal('length')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('status')->default(App\House::UNAVAILABLE);
            $table->string('slug')->nullable();
            $table->integer('location_id')->unsigned()->nullable();
            $table->integer('district_id')->unsigned()->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('houses');
    }
}
