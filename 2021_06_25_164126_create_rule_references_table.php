<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_references', function (Blueprint $table) {
            $table->integer('rule_id')->index('IDX_A4AFA147744E0351');
            $table->integer('reference_id')->index('IDX_A4AFA1471645DEA9');
            $table->primary(['rule_id', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rule_references');
    }
}
