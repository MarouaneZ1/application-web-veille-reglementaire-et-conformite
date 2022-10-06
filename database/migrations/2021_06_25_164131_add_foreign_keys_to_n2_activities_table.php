<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToN2ActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('n2_activities', function (Blueprint $table) {
            $table->foreign('section_id', 'FK_BE4ED686D823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_activity_id', 'FK_BE4ED686E8BA83C3')->references('id')->on('n1_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('n2_activities', function (Blueprint $table) {
            $table->dropForeign('FK_BE4ED686D823E37A');
            $table->dropForeign('FK_BE4ED686E8BA83C3');
        });
    }
}
