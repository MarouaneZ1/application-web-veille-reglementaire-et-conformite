<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_sites', function (Blueprint $table) {
            $table->foreign('user_id', 'FK_5EC2513BA76ED395')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('site_id', 'FK_5EC2513BF6BD1646')->references('id')->on('sites')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_sites', function (Blueprint $table) {
            $table->dropForeign('FK_5EC2513BA76ED395');
            $table->dropForeign('FK_5EC2513BF6BD1646');
        });
    }
}
