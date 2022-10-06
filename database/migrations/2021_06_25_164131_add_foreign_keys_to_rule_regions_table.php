<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRuleRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rule_regions', function (Blueprint $table) {
            $table->foreign('commune_id', 'FK_52F34047131A4F72')->references('id')->on('communes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('rule_id', 'FK_52F34047744E0351')->references('id')->on('rules')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('region_id', 'FK_52F3404798260155')->references('id')->on('region')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prefecture_id', 'FK_52F340479D39C865')->references('id')->on('prefecture')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('province_id', 'FK_52F34047E946114A')->references('id')->on('provinces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rule_regions', function (Blueprint $table) {
            $table->dropForeign('FK_52F34047131A4F72');
            $table->dropForeign('FK_52F34047744E0351');
            $table->dropForeign('FK_52F3404798260155');
            $table->dropForeign('FK_52F340479D39C865');
            $table->dropForeign('FK_52F34047E946114A');
        });
    }
}
