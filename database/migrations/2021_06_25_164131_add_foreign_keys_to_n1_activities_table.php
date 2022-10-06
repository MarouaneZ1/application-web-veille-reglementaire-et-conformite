<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToN1ActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('n1_activities', function (Blueprint $table) {
            $table->foreign('section_id', 'FK_C9D00476D823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('n1_activities', function (Blueprint $table) {
            $table->dropForeign('FK_C9D00476D823E37A');
        });
    }
}
