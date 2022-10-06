<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_regions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('region_id')->nullable()->index('IDX_86C656CC98260155');
            $table->integer('prefecture_id')->nullable()->index('IDX_86C656CC9D39C865');
            $table->integer('province_id')->nullable()->index('IDX_86C656CCE946114A');
            $table->integer('commune_id')->nullable()->index('IDX_86C656CC131A4F72');
            $table->integer('text_id')->nullable()->index('IDX_86C656CC698D3548');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_regions');
    }
}
