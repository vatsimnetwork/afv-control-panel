<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwyConfigRwyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rwy_config_rwy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rwy_config_id');
            $table->unsignedBigInteger('rwy_id');

            $table->foreign('rwy_config_id')
                  ->references('id')
                  ->on('rwy_configs')
                  ->onDelete('cascade');

            $table->foreign('rwy_id')
                  ->references('id')
                  ->on('runways')
                  ->onDelete('cascade');

            $table->unique([
                'rwy_config_id',
                'rwy_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rwy_config_rwy');
    }
}
