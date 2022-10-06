<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDefinitionAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definition_aspects', function (Blueprint $table) {
            $table->foreign('n3_aspect_id', 'FK_358217333D78E283')->references('id')->on('n3_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('theme_id', 'FK_3582173359027487')->references('id')->on('themes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_aspect_id', 'FK_3582173365145B42')->references('id')->on('n1_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('aspect_id', 'FK_3582173398507F8C')->references('id')->on('aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('definition_id', 'FK_35821733D11EA911')->references('id')->on('definitions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n2_aspect_id', 'FK_35821733FCF63D43')->references('id')->on('n2_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('definition_aspects', function (Blueprint $table) {
            $table->dropForeign('FK_358217333D78E283');
            $table->dropForeign('FK_3582173359027487');
            $table->dropForeign('FK_3582173365145B42');
            $table->dropForeign('FK_3582173398507F8C');
            $table->dropForeign('FK_35821733D11EA911');
            $table->dropForeign('FK_35821733FCF63D43');
        });
    }
}
