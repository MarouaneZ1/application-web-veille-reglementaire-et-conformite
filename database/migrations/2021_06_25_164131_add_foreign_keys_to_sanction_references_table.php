<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSanctionReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanction_references', function (Blueprint $table) {
            $table->foreign('reference_id', 'FK_FAD8157F1645DEA9')->references('id')->on('sanctions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('sanction_id', 'FK_FAD8157F96E0C11A')->references('id')->on('sanctions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanction_references', function (Blueprint $table) {
            $table->dropForeign('FK_FAD8157F1645DEA9');
            $table->dropForeign('FK_FAD8157F96E0C11A');
        });
    }
}
