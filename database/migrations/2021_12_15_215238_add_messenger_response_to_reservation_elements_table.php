<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessengerResponseToReservationElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservation_elements', function (Blueprint $table) {
            $table->text('messenger_response')->nullable();
            $table->string('messenger_response_image')->nullable();
            $table->datetime('messenger_response_at')->nullable();
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
