<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDefinitionRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definition_regions', function (Blueprint $table) {
            $table->foreign('commune_id', 'FK_971A8773131A4F72')->references('id')->on('communes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('region_id', 'FK_971A877398260155')->references('id')->on('region')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prefecture_id', 'FK_971A87739D39C865')->references('id')->on('prefecture')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('definition_id', 'FK_971A8773D11EA911')->references('id')->on('definitions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('province_id', 'FK_971A8773E946114A')->references('id')->on('provinces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('definition_regions', function (Blueprint $table) {
            $table->dropForeign('FK_971A8773131A4F72');
            $table->dropForeign('FK_971A877398260155');
            $table->dropForeign('FK_971A87739D39C865');
            $table->dropForeign('FK_971A8773D11EA911');
            $table->dropForeign('FK_971A8773E946114A');
        });
    }
}
