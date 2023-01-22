<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alerts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postal_zip_id')->notNullable();
            $table->unsignedBigInteger('citie_id')->notNullable();
            $table->unsignedBigInteger('department_id')->notNullable();
            $table->unsignedBigInteger('account_id')->notNullable();
            $table->unsignedBigInteger('post_type_id')->notNullable();
            $table->string('email');
            $table->decimal('min_price',10,2);
            $table->decimal('max_price',10,2);
            $table->integer('min_number_room');
            $table->integer('max_number_room');
            $table->integer('min_surface');
            $table->integer('max_surface');
            $table->integer('min_number_bedroom');
            $table->integer('max_number_bedroom');
            $table->integer('min_number_bathroom');
            $table->integer('max_number_bathroom');
            $table->integer('min_number_wc');
            $table->integer('max_number_wc');
            $table->integer('min_surface_field');
            $table->integer('max_surface_field');
            $table->boolean('balcony');
            $table->boolean('terrace');
            $table->boolean('cellar');
            $table->boolean('car_park');
            $table->boolean('garden');
            $table->boolean('digicode');
            $table->boolean('intercom');
            $table->boolean('guardian');
            $table->boolean('lift');
            $table->boolean('chimney');
            $table->boolean('pool');
            $table->boolean('separate_toilet');
            $table->boolean('furniture');
            $table->boolean('unfurnished');
            $table->boolean('expanded_fiber');
            $table->boolean('electric_vehicle_charging');
            $table->boolean('duplex');
            $table->boolean('last_stage');
            $table->boolean('ground_floor');
            $table->boolean('avoid_ground_floor');
            $table->boolean('energy_consumption');
            $table->timestamps();

            $table->foreign('postal_zip_id')->references('id')->on('postal_zips');
            $table->foreign('citie_id')->references('id')->on('cities');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('post_type_id')->references('id')->on('post_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alerts');
    }
}
