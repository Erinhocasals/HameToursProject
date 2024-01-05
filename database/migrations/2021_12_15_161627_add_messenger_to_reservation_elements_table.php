<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessengerToReservationElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservation_elements', function (Blueprint $table) {
            $table->integer('messenger_id')->unsigned()->nullable();
            $table->foreign('messenger_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('messenger_taken_at')->nullable();
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
