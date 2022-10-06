<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSanctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanctions', function (Blueprint $table) {
            $table->foreign('text_id', 'FK_5D0A15E3698D3548')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('updated_by_id', 'FK_5D0A15E3896DBBDE')->references('id')->on('sanctions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanctions', function (Blueprint $table) {
            $table->dropForeign('FK_5D0A15E3698D3548');
            $table->dropForeign('FK_5D0A15E3896DBBDE');
        });
    }
}
