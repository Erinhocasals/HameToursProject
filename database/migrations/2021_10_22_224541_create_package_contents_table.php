<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('contentable_id');
            $table->string('contentable_type');
            $table->integer('time_id')->unsigned();
            $table->foreign('time_id')->references('id')->on('package_times')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_contents');
    }
}
