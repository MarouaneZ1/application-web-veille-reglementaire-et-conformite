<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDefinitionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definition_activities', function (Blueprint $table) {
            $table->foreign('n2_activity_id', 'FK_F04F75E25570EF0D')->references('id')->on('n2_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('activity_id', 'FK_F04F75E281C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('definition_id', 'FK_F04F75E2D11EA911')->references('id')->on('definitions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('section_id', 'FK_F04F75E2D823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_activity_id', 'FK_F04F75E2E8BA83C3')->references('id')->on('n1_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('definition_activities', function (Blueprint $table) {
            $table->dropForeign('FK_F04F75E25570EF0D');
            $table->dropForeign('FK_F04F75E281C06096');
            $table->dropForeign('FK_F04F75E2D11EA911');
            $table->dropForeign('FK_F04F75E2D823E37A');
            $table->dropForeign('FK_F04F75E2E8BA83C3');
        });
    }
}
