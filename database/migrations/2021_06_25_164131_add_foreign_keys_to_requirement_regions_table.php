<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRequirementRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirement_regions', function (Blueprint $table) {
            $table->foreign('commune_id', 'FK_F9ED5668131A4F72')->references('id')->on('communes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('requirement_id', 'FK_F9ED56687B576F77')->references('id')->on('requirement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('region_id', 'FK_F9ED566898260155')->references('id')->on('region')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prefecture_id', 'FK_F9ED56689D39C865')->references('id')->on('prefecture')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('province_id', 'FK_F9ED5668E946114A')->references('id')->on('provinces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirement_regions', function (Blueprint $table) {
            $table->dropForeign('FK_F9ED5668131A4F72');
            $table->dropForeign('FK_F9ED56687B576F77');
            $table->dropForeign('FK_F9ED566898260155');
            $table->dropForeign('FK_F9ED56689D39C865');
            $table->dropForeign('FK_F9ED5668E946114A');
        });
    }
}
