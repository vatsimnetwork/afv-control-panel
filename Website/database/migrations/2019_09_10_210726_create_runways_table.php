<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('airport_id');
            $table->string('designator', 3);
            $table->unsignedSmallInteger('heading');
            $table->timestamps();
            
            $table->foreign('airport_id')->references('id')->on('airports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runways');
    }
}
