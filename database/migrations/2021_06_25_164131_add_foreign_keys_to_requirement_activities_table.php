<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRequirementActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirement_activities', function (Blueprint $table) {
            $table->foreign('n2_activity_id', 'FK_5BC6AAFC5570EF0D')->references('id')->on('n2_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('requirement_id', 'FK_5BC6AAFC7B576F77')->references('id')->on('requirement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('activity_id', 'FK_5BC6AAFC81C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('section_id', 'FK_5BC6AAFCD823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_activity_id', 'FK_5BC6AAFCE8BA83C3')->references('id')->on('n1_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirement_activities', function (Blueprint $table) {
            $table->dropForeign('FK_5BC6AAFC5570EF0D');
            $table->dropForeign('FK_5BC6AAFC7B576F77');
            $table->dropForeign('FK_5BC6AAFC81C06096');
            $table->dropForeign('FK_5BC6AAFCD823E37A');
            $table->dropForeign('FK_5BC6AAFCE8BA83C3');
        });
    }
}
