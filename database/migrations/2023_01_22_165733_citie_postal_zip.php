<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitiePostalZip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citie_postal_zip', function (Blueprint $table) {
            $table->unsignedBigInteger('citie_id')->notNullable();
            $table->unsignedBigInteger('postal_zip_id')->notNullable();
            $table->timestamps();

            $table->primary(['citie_id', 'postal_zip_id']);
            $table->foreign('citie_id')->references('id')->on('cities');
            $table->foreign('postal_zip_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citie_postal_zip');
    }
}
