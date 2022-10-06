<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRuleAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rule_aspects', function (Blueprint $table) {
            $table->foreign('n3_aspect_id', 'FK_F06BD0073D78E283')->references('id')->on('n3_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('theme_id', 'FK_F06BD00759027487')->references('id')->on('themes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_aspect_id', 'FK_F06BD00765145B42')->references('id')->on('n1_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('rule_id', 'FK_F06BD007744E0351')->references('id')->on('rules')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('aspect_id', 'FK_F06BD00798507F8C')->references('id')->on('aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n2_aspect_id', 'FK_F06BD007FCF63D43')->references('id')->on('n2_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rule_aspects', function (Blueprint $table) {
            $table->dropForeign('FK_F06BD0073D78E283');
            $table->dropForeign('FK_F06BD00759027487');
            $table->dropForeign('FK_F06BD00765145B42');
            $table->dropForeign('FK_F06BD007744E0351');
            $table->dropForeign('FK_F06BD00798507F8C');
            $table->dropForeign('FK_F06BD007FCF63D43');
        });
    }
}
