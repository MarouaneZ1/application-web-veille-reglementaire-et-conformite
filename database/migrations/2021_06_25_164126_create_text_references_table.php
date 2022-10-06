<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_references', function (Blueprint $table) {
            $table->integer('text_id')->index('IDX_3E42406698D3548');
            $table->integer('reference_id')->index('IDX_3E424061645DEA9');
            $table->primary(['text_id', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_references');
    }
}
