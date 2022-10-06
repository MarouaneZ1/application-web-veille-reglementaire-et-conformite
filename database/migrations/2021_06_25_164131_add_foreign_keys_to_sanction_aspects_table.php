<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSanctionAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanction_aspects', function (Blueprint $table) {
            $table->foreign('n3_aspect_id', 'FK_BCA27ED63D78E283')->references('id')->on('n3_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('theme_id', 'FK_BCA27ED659027487')->references('id')->on('themes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_aspect_id', 'FK_BCA27ED665145B42')->references('id')->on('n1_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('sanction_id', 'FK_BCA27ED696E0C11A')->references('id')->on('sanctions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('aspect_id', 'FK_BCA27ED698507F8C')->references('id')->on('aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n2_aspect_id', 'FK_BCA27ED6FCF63D43')->references('id')->on('n2_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanction_aspects', function (Blueprint $table) {
            $table->dropForeign('FK_BCA27ED63D78E283');
            $table->dropForeign('FK_BCA27ED659027487');
            $table->dropForeign('FK_BCA27ED665145B42');
            $table->dropForeign('FK_BCA27ED696E0C11A');
            $table->dropForeign('FK_BCA27ED698507F8C');
            $table->dropForeign('FK_BCA27ED6FCF63D43');
        });
    }
}
