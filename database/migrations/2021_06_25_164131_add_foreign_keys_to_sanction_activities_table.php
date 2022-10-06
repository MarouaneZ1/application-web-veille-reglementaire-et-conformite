<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSanctionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanction_activities', function (Blueprint $table) {
            $table->foreign('n2_activity_id', 'FK_D03797065570EF0D')->references('id')->on('n2_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('activity_id', 'FK_D037970681C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('sanction_id', 'FK_D037970696E0C11A')->references('id')->on('sanctions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('section_id', 'FK_D0379706D823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_activity_id', 'FK_D0379706E8BA83C3')->references('id')->on('n1_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanction_activities', function (Blueprint $table) {
            $table->dropForeign('FK_D03797065570EF0D');
            $table->dropForeign('FK_D037970681C06096');
            $table->dropForeign('FK_D037970696E0C11A');
            $table->dropForeign('FK_D0379706D823E37A');
            $table->dropForeign('FK_D0379706E8BA83C3');
        });
    }
}
