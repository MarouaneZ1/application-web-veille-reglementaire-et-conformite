<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRequirementAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirement_aspects', function (Blueprint $table) {
            $table->foreign('n3_aspect_id', 'FK_5B75C6283D78E283')->references('id')->on('n3_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('theme_id', 'FK_5B75C62859027487')->references('id')->on('themes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_aspect_id', 'FK_5B75C62865145B42')->references('id')->on('n1_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('requirement_id', 'FK_5B75C6287B576F77')->references('id')->on('requirement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('aspect_id', 'FK_5B75C62898507F8C')->references('id')->on('aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n2_aspect_id', 'FK_5B75C628FCF63D43')->references('id')->on('n2_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirement_aspects', function (Blueprint $table) {
            $table->dropForeign('FK_5B75C6283D78E283');
            $table->dropForeign('FK_5B75C62859027487');
            $table->dropForeign('FK_5B75C62865145B42');
            $table->dropForeign('FK_5B75C6287B576F77');
            $table->dropForeign('FK_5B75C62898507F8C');
            $table->dropForeign('FK_5B75C628FCF63D43');
        });
    }
}
