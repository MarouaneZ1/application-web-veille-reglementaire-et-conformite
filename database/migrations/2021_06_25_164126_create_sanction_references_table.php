<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_references', function (Blueprint $table) {
            $table->integer('sanction_id')->index('IDX_FAD8157F96E0C11A');
            $table->integer('reference_id')->index('IDX_FAD8157F1645DEA9');
            $table->primary(['sanction_id', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanction_references');
    }
}
