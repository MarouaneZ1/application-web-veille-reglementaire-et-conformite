<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->foreign('region_id', 'FK_BC00AA6398260155')->references('id')->on('region')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prefecture_id', 'FK_BC00AA639D39C865')->references('id')->on('prefecture')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('society_id', 'FK_BC00AA63E6389D24')->references('id')->on('societies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->dropForeign('FK_BC00AA6398260155');
            $table->dropForeign('FK_BC00AA639D39C865');
            $table->dropForeign('FK_BC00AA63E6389D24');
        });
    }
}
