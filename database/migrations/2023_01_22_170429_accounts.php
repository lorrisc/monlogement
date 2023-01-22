<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Accounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_type_id')->notNullable();
            $table->string('email');
            $table->string('firstname');
            $table->string('surname');
            $table->string('phone');
            $table->string('password');
            $table->boolean('display_email');
            $table->boolean('display_phone');
            $table->string('agency_name');
            $table->string('website');
            $table->string('siret');
            $table->string('photo_agency_url');
            $table->timestamps();

            $table->foreign('account_type_id')->references('id')->on('account_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
