<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Properties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postal_zip_id')->notNullable();
            $table->unsignedBigInteger('citie_id')->notNullable();
            $table->unsignedBigInteger('account_id')->notNullable();
            $table->unsignedBigInteger('post_type_id')->notNullable();
            $table->unsignedBigInteger('property_type_id')->notNullable();
            $table->date('publication_date');
            $table->date('modification_date');
            $table->text('description');
            $table->string('street');
            $table->decimal('price',10,2);
            $table->integer('number_room');
            $table->integer('surface');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->integer('wc');
            $table->integer('surface_field');
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
            $table->boolean('energy_consumption_value');
            $table->timestamps();

            $table->foreign('postal_zip_id')->references('id')->on('postal_zips');
            $table->foreign('citie_id')->references('id')->on('cities');
            $table->foreign('property_type_id')->references('id')->on('property_types');
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
        Schema::dropIfExists('properties');
    }
}
