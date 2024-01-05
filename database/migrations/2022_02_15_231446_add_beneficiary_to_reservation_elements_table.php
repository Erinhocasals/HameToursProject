<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBeneficiaryToReservationElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservation_elements', function (Blueprint $table) {
            $table->integer('beneficiary_id')->unsigned()->nullable();
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation_elements', function (Blueprint $table) {
            //
        });
    }
}
