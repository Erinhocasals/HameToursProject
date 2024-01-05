<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_definitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('definition_id')->unsigned();
            $table->integer('entity_id')->unsigned();

            $table->foreign('definition_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('entity_id')->references('id')->on('entities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_definitions');
    }
}
