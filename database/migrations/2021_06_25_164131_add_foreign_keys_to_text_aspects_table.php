<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTextAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text_aspects', function (Blueprint $table) {
            $table->foreign('n3_aspect_id', 'FK_245EC68C3D78E283')->references('id')->on('n3_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('theme_id', 'FK_245EC68C59027487')->references('id')->on('themes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_aspect_id', 'FK_245EC68C65145B42')->references('id')->on('n1_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('text_id', 'FK_245EC68C698D3548')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('aspect_id', 'FK_245EC68C98507F8C')->references('id')->on('aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n2_aspect_id', 'FK_245EC68CFCF63D43')->references('id')->on('n2_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text_aspects', function (Blueprint $table) {
            $table->dropForeign('FK_245EC68C3D78E283');
            $table->dropForeign('FK_245EC68C59027487');
            $table->dropForeign('FK_245EC68C65145B42');
            $table->dropForeign('FK_245EC68C698D3548');
            $table->dropForeign('FK_245EC68C98507F8C');
            $table->dropForeign('FK_245EC68CFCF63D43');
        });
    }
}
