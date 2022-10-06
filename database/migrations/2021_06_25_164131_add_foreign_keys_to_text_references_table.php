<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTextReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text_references', function (Blueprint $table) {
            $table->foreign('reference_id', 'FK_3E424061645DEA9')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('text_id', 'FK_3E42406698D3548')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text_references', function (Blueprint $table) {
            $table->dropForeign('FK_3E424061645DEA9');
            $table->dropForeign('FK_3E42406698D3548');
        });
    }
}
