<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRuleActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rule_activities', function (Blueprint $table) {
            $table->foreign('n2_activity_id', 'FK_8E40233E5570EF0D')->references('id')->on('n2_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('rule_id', 'FK_8E40233E744E0351')->references('id')->on('rules')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('activity_id', 'FK_8E40233E81C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('section_id', 'FK_8E40233ED823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_activity_id', 'FK_8E40233EE8BA83C3')->references('id')->on('n1_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rule_activities', function (Blueprint $table) {
            $table->dropForeign('FK_8E40233E5570EF0D');
            $table->dropForeign('FK_8E40233E744E0351');
            $table->dropForeign('FK_8E40233E81C06096');
            $table->dropForeign('FK_8E40233ED823E37A');
            $table->dropForeign('FK_8E40233EE8BA83C3');
        });
    }
}
