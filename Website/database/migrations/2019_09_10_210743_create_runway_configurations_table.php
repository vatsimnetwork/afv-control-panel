<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunwayConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runway_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('runway_id');
            $table->unsignedTinyInteger('type'); // Dep/Arr/Both
            $table->time('from');
            $table->time('to');
            $table->unsignedTinyInteger('max_tailwind')->nullable();
            $table->unsignedTinyInteger('max_crosswind')->nullable();
            $table->timestamps();

            $table->foreign('runway_id')->references('id')->on('runways')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runway_configurations');
    }
}
