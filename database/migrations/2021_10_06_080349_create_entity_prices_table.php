<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('top_line')->nullable();
            $table->decimal('price');
            $table->string('bottom_line')->nullable();
            $table->boolean('enabled');
            $table->integer('entity_id')->unsigned();
            $table->string('country_code')->nullable();
            $table->foreign('entity_id')->references('id')->on('entities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entity_prices');
    }
}
