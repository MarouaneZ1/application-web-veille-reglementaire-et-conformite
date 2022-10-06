<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinitionReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definition_references', function (Blueprint $table) {
            $table->integer('definition_id')->index('IDX_DAA0F79BD11EA911');
            $table->integer('reference_id')->index('IDX_DAA0F79B1645DEA9');
            $table->primary(['definition_id', 'reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('definition_references');
    }
}
