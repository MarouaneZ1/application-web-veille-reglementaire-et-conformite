<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTextRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text_regions', function (Blueprint $table) {
            $table->foreign('commune_id', 'FK_86C656CC131A4F72')->references('id')->on('communes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('text_id', 'FK_86C656CC698D3548')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('region_id', 'FK_86C656CC98260155')->references('id')->on('region')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prefecture_id', 'FK_86C656CC9D39C865')->references('id')->on('prefecture')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('province_id', 'FK_86C656CCE946114A')->references('id')->on('provinces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text_regions', function (Blueprint $table) {
            $table->dropForeign('FK_86C656CC131A4F72');
            $table->dropForeign('FK_86C656CC698D3548');
            $table->dropForeign('FK_86C656CC98260155');
            $table->dropForeign('FK_86C656CC9D39C865');
            $table->dropForeign('FK_86C656CCE946114A');
        });
    }
}
