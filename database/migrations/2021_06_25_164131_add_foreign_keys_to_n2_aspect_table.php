<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToN2AspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('n2_aspect', function (Blueprint $table) {
            $table->foreign('n1_aspect_id', 'FK_219CE13065145B42')->references('id')->on('n1_aspect')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('n2_aspect', function (Blueprint $table) {
            $table->dropForeign('FK_219CE13065145B42');
        });
    }
}
