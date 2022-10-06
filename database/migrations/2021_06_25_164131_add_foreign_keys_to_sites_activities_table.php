<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSitesActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites_activities', function (Blueprint $table) {
            $table->foreign('activity_id', 'FK_20AFF65481C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('site_id', 'FK_20AFF654F6BD1646')->references('id')->on('sites')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites_activities', function (Blueprint $table) {
            $table->dropForeign('FK_20AFF65481C06096');
            $table->dropForeign('FK_20AFF654F6BD1646');
        });
    }
}
