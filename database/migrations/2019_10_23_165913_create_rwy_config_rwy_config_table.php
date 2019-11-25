<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwyConfigRwyConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rwy_config_rwy_config', function (Blueprint $table) {
            /**
             * For airport_runway_configuration to be active, airport_runway_configuration_active must be active too (careful infinite loops!)
             */
            $table->unsignedBigInteger('rwy_config_id');
            $table->unsignedBigInteger('rwy_config_id_active');
            
            $table->foreign('rwy_config_id')
                  ->references('id')
                  ->on('rwy_configs')
                  ->onDelete('cascade');

            $table->foreign('rwy_config_id_active')
                  ->references('id')
                  ->on('rwy_configs')
                  ->onDelete('cascade');

            $table->unique([
                'rwy_config_id',
                'rwy_config_id_active',
            ]);

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
        Schema::dropIfExists('rwy_config_rwy_config');
    }
}
