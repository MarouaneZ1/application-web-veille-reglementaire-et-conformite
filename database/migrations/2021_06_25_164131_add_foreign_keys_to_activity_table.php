<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity', function (Blueprint $table) {
            $table->foreign('n2_activity_id', 'FK_AC74095A5570EF0D')->references('id')->on('n2_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('section_id', 'FK_AC74095AD823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_activity_id', 'FK_AC74095AE8BA83C3')->references('id')->on('n1_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity', function (Blueprint $table) {
            $table->dropForeign('FK_AC74095A5570EF0D');
            $table->dropForeign('FK_AC74095AD823E37A');
            $table->dropForeign('FK_AC74095AE8BA83C3');
        });
    }
}
