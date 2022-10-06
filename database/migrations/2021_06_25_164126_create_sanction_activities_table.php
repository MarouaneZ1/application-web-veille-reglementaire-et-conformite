<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('sanction_id')->nullable()->index('IDX_D037970696E0C11A');
            $table->integer('section_id')->nullable()->index('IDX_D0379706D823E37A');
            $table->integer('activity_id')->nullable()->index('IDX_D037970681C06096');
            $table->integer('n1_activity_id')->nullable()->index('IDX_D0379706E8BA83C3');
            $table->integer('n2_activity_id')->nullable()->index('IDX_D03797065570EF0D');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanction_activities');
    }
}
