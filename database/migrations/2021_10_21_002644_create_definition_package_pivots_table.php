<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinitionPackagePivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definition_package', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('definition_id')->unsigned();
            $table->integer('package_id')->unsigned();

            $table->foreign('definition_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('definition_package');
    }
}
