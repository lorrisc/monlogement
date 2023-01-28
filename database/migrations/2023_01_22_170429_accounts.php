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
            $table->string('email')->unique();
            $table->string('firstname')->nullable();
            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->boolean('display_email')->default(false);
            $table->boolean('display_phone')->default(false);
            $table->string('agency_name')->nullable();
            $table->string('website')->nullable();
            $table->string('siret')->nullable();
            $table->string('photo_agency_url')->nullable();
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
