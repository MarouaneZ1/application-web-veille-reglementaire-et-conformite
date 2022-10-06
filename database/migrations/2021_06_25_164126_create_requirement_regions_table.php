<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_regions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('requirement_id')->nullable()->index('IDX_F9ED56687B576F77');
            $table->integer('region_id')->nullable()->index('IDX_F9ED566898260155');
            $table->integer('prefecture_id')->nullable()->index('IDX_F9ED56689D39C865');
            $table->integer('province_id')->nullable()->index('IDX_F9ED5668E946114A');
            $table->integer('commune_id')->nullable()->index('IDX_F9ED5668131A4F72');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_regions');
    }
}
