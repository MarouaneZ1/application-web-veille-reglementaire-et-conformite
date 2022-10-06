<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_activity', function (Blueprint $table) {
            $table->foreign('activity_id', 'FK_16DBE70381C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_activity', function (Blueprint $table) {
            $table->dropForeign('FK_16DBE70381C06096');
        });
    }
}
