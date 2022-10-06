<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDefinitionReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definition_references', function (Blueprint $table) {
            $table->foreign('reference_id', 'FK_DAA0F79B1645DEA9')->references('id')->on('definitions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('definition_id', 'FK_DAA0F79BD11EA911')->references('id')->on('definitions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('definition_references', function (Blueprint $table) {
            $table->dropForeign('FK_DAA0F79B1645DEA9');
            $table->dropForeign('FK_DAA0F79BD11EA911');
        });
    }
}
