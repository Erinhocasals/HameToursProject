<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserShareContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_share_contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->integer('shareable_id');
            $table->string('shareable_type');
            $table->string('referral');
            $table->decimal('tax')->default(0);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_share_contents');
    }
}
