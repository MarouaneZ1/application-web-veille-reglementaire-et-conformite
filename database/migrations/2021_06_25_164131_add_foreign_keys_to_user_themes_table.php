<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_themes', function (Blueprint $table) {
            $table->foreign('theme_id', 'FK_701029E359027487')->references('id')->on('themes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'FK_701029E3A76ED395')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_themes', function (Blueprint $table) {
            $table->dropForeign('FK_701029E359027487');
            $table->dropForeign('FK_701029E3A76ED395');
        });
    }
}
