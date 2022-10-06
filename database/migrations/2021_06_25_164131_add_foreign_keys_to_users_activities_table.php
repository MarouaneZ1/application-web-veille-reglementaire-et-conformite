<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_activities', function (Blueprint $table) {
            $table->foreign('activity_id', 'FK_629A007181C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'FK_629A0071A76ED395')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_activities', function (Blueprint $table) {
            $table->dropForeign('FK_629A007181C06096');
            $table->dropForeign('FK_629A0071A76ED395');
        });
    }
}
