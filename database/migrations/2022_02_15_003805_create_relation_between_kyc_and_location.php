<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationBetweenKycAndLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('k_y_c_locations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('kyc_id')->unsigned();
            $table->integer('location_id')->unsigned();

            $table->foreign('kyc_id')->references('id')->on('k_y_c_s')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_between_kyc_and_location');
    }
}
