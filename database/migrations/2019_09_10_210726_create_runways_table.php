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
            $table->string('airport_icao', 4);
            $table->string('designator', 3);
            $table->unsignedSmallInteger('heading');
            $table->timestamps();
            
            $table->foreign('airport_icao')
                  ->references('icao')
                  ->on('airports')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->unique([
                'airport_icao',
                'designator',
            ]);

            $table->index('airport_icao');
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
