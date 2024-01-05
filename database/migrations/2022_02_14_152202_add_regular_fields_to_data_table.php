<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegularFieldsToDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data', function (Blueprint $table) {
            $table->string('hame_phone')->nullable();
            $table->string('hame_email')->nullable();
            $table->string('hame_address')->nullable();
            $table->string('hame_schedule')->nullable();

            $table->boolean('maintenance')->default(false);

            $table->decimal('ref_earn_level1')->nullable();
            $table->decimal('ref_earn_level2')->nullable();
            $table->decimal('ref_earn_level3')->nullable();

            $table->integer('time_mailman_to_deliver')->nullable();
            $table->integer('time_client_to_confirm')->nullable();
            $table->integer('time_remittances_priority_to_referrals')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data', function (Blueprint $table) {
            //
        });
    }
}
