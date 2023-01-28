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
            $table->unsignedBigInteger('postal_zip_id')->nullable();
            $table->unsignedBigInteger('citie_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('account_id')->notNullable();
            $table->unsignedBigInteger('post_type_id')->notNullable();
            $table->string('email')->notNullable();
            $table->decimal('min_price',10,2)->nullable();
            $table->decimal('max_price',10,2)->nullable();
            $table->integer('min_number_room')->nullable();
            $table->integer('max_number_room')->nullable();
            $table->integer('min_surface')->nullable();
            $table->integer('max_surface')->nullable();
            $table->integer('min_number_bedroom')->nullable();
            $table->integer('max_number_bedroom')->nullable();
            $table->integer('min_number_bathroom')->nullable();
            $table->integer('max_number_bathroom')->nullable();
            $table->integer('min_number_wc')->nullable();
            $table->integer('max_number_wc')->nullable();
            $table->integer('min_surface_field')->nullable();
            $table->integer('max_surface_field')->nullable();
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
            $table->boolean('avoid_ground_floor')->default(false);
            $table->string('energy_consumption')->nullable();
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
