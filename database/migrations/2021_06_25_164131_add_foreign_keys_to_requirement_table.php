<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirement', function (Blueprint $table) {
            $table->foreign('text_id', 'FK_DB3F5550698D3548')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('updated_by_id', 'FK_DB3F5550896DBBDE')->references('id')->on('requirement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirement', function (Blueprint $table) {
            $table->dropForeign('FK_DB3F5550698D3548');
            $table->dropForeign('FK_DB3F5550896DBBDE');
        });
    }
}
