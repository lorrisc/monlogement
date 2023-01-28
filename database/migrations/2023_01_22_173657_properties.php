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
            $table->text('description');
            $table->string('street');
            $table->decimal('price',10,2);
            $table->integer('number_room');
            $table->integer('surface');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->integer('wc');
            $table->integer('surface_field');
            $table->boolean('balcony')->default(false);
            $table->boolean('terrace')->default(false);
            $table->boolean('cellar')->default(false);
            $table->boolean('car_park')->default(false);
            $table->boolean('garden')->default(false);
            $table->boolean('digicode')->default(false);
            $table->boolean('intercom')->default(false);
            $table->boolean('guardian')->default(false);
            $table->boolean('lift')->default(false);
            $table->boolean('chimney')->default(false);
            $table->boolean('pool')->default(false);
            $table->boolean('separate_toilet')->default(false);
            $table->boolean('furniture')->default(false);
            $table->boolean('unfurnished')->default(false);
            $table->boolean('expanded_fiber')->default(false);
            $table->boolean('electric_vehicle_charging')->default(false);
            $table->boolean('duplex')->default(false);
            $table->boolean('last_stage')->default(false);
            $table->boolean('ground_floor')->default(false);
            $table->integer('energy_consumption_value')->nullable();
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
