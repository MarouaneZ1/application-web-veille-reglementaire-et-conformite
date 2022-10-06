<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRuleReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rule_references', function (Blueprint $table) {
            $table->foreign('reference_id', 'FK_A4AFA1471645DEA9')->references('id')->on('rules')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('rule_id', 'FK_A4AFA147744E0351')->references('id')->on('rules')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rule_references', function (Blueprint $table) {
            $table->dropForeign('FK_A4AFA1471645DEA9');
            $table->dropForeign('FK_A4AFA147744E0351');
        });
    }
}
