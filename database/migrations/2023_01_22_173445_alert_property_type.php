<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertPropertyType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_property_type', function (Blueprint $table) {
            $table->unsignedBigInteger('alert_id')->notNullable();
            $table->unsignedBigInteger('property_type_id')->notNullable();
            $table->timestamps();

            $table->primary(['alert_id', 'property_type_id']);
            $table->foreign('alert_id')->references('id')->on('alerts');
            $table->foreign('property_type_id')->references('id')->on('property_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alert_property_type');
    }
}
