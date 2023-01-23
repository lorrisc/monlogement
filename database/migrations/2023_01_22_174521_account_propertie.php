<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountPropertie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_propertie', function (Blueprint $table) {
            $table->unsignedBigInteger('account_id')->notNullable();
            $table->unsignedBigInteger('propertie_id')->notNullable();
            $table->timestamps();

            $table->primary(['account_id', 'propertie_id']);
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('propertie_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_propertie');
    }
}
