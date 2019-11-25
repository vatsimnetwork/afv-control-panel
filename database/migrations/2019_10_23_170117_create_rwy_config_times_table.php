<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwyConfigTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rwy_config_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rwy_config_id');
            $table->time('from');
            $table->time('to');

            $table->foreign('rwy_config_id')
                  ->references('id')
                  ->on('rwy_configs')
                  ->onDelete('cascade');

            $table->index('rwy_config_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rwy_config_times');
    }
}
