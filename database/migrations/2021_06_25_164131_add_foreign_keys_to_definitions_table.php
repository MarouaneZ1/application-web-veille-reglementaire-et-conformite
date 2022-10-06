<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definitions', function (Blueprint $table) {
            $table->foreign('text_id', 'FK_936EA5C2698D3548')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('updated_by_id', 'FK_936EA5C2896DBBDE')->references('id')->on('definitions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('definitions', function (Blueprint $table) {
            $table->dropForeign('FK_936EA5C2698D3548');
            $table->dropForeign('FK_936EA5C2896DBBDE');
        });
    }
}
