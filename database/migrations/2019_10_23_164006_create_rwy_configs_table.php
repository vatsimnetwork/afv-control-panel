<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwyConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rwy_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('airport_icao', 4);
            $table->string('description');

            $table->unsignedSmallInteger('reference_heading')->nullable();
            $table->unsignedTinyInteger('max_tailwind')->nullable();
            $table->unsignedTinyInteger('max_crosswind')->nullable();

            $table->timestamps();

            $table->foreign('airport_icao')
                  ->references('icao')
                  ->on('airports')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rwy_configs');
    }
}
