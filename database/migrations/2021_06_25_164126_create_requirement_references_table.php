<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_references', function (Blueprint $table) {
            $table->integer('requirement_id')->index('IDX_712928857B576F77');
            $table->integer('reference_id')->index('IDX_712928851645DEA9');
            $table->primary(['requirement_id', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_references');
    }
}
