<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites_activities', function (Blueprint $table) {
            $table->integer('site_id')->index('IDX_20AFF654F6BD1646');
            $table->integer('activity_id')->index('IDX_20AFF65481C06096');
            $table->primary(['site_id', 'activity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites_activities');
    }
}
