<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRequirementReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirement_references', function (Blueprint $table) {
            $table->foreign('reference_id', 'FK_712928851645DEA9')->references('id')->on('requirement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('requirement_id', 'FK_712928857B576F77')->references('id')->on('requirement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirement_references', function (Blueprint $table) {
            $table->dropForeign('FK_712928851645DEA9');
            $table->dropForeign('FK_712928857B576F77');
        });
    }
}
