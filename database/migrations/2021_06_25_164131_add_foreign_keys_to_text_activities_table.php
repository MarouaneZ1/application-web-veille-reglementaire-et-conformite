<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTextActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text_activities', function (Blueprint $table) {
            $table->foreign('n2_activity_id', 'FK_290BA67F5570EF0D')->references('id')->on('n2_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('text_id', 'FK_290BA67F698D3548')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('activity_id', 'FK_290BA67F81C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('section_id', 'FK_290BA67FD823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_activity_id', 'FK_290BA67FE8BA83C3')->references('id')->on('n1_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text_activities', function (Blueprint $table) {
            $table->dropForeign('FK_290BA67F5570EF0D');
            $table->dropForeign('FK_290BA67F698D3548');
            $table->dropForeign('FK_290BA67F81C06096');
            $table->dropForeign('FK_290BA67FD823E37A');
            $table->dropForeign('FK_290BA67FE8BA83C3');
        });
    }
}
