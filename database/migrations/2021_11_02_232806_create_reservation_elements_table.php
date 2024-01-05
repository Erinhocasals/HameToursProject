<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_elements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('content')->nullable();
            $table->integer('quantity');
            $table->integer('elementable_id');
            $table->string('elementable_type');
            $table->integer('parentable_id')->nullable();
            $table->string('parentable_type')->nullable();
            $table->integer('reservation_id')->unsigned()->nullable();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_elements');
    }
}
