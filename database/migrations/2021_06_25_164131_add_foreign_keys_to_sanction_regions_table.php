<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSanctionRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanction_regions', function (Blueprint $table) {
            $table->foreign('commune_id', 'FK_1E3AEE96131A4F72')->references('id')->on('communes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('sanction_id', 'FK_1E3AEE9696E0C11A')->references('id')->on('sanctions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('region_id', 'FK_1E3AEE9698260155')->references('id')->on('region')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prefecture_id', 'FK_1E3AEE969D39C865')->references('id')->on('prefecture')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('province_id', 'FK_1E3AEE96E946114A')->references('id')->on('provinces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanction_regions', function (Blueprint $table) {
            $table->dropForeign('FK_1E3AEE96131A4F72');
            $table->dropForeign('FK_1E3AEE9696E0C11A');
            $table->dropForeign('FK_1E3AEE9698260155');
            $table->dropForeign('FK_1E3AEE969D39C865');
            $table->dropForeign('FK_1E3AEE96E946114A');
        });
    }
}
