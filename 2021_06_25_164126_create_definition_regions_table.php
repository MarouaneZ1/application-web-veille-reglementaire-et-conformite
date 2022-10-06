<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinitionRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definition_regions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('definition_id')->nullable()->index('IDX_971A8773D11EA911');
            $table->integer('region_id')->nullable()->index('IDX_971A877398260155');
            $table->integer('prefecture_id')->nullable()->index('IDX_971A87739D39C865');
            $table->integer('province_id')->nullable()->index('IDX_971A8773E946114A');
            $table->integer('commune_id')->nullable()->index('IDX_971A8773131A4F72');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('definition_regions');
    }
}
