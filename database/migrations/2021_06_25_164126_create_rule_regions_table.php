<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_regions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('rule_id')->nullable()->index('IDX_52F34047744E0351');
            $table->integer('region_id')->nullable()->index('IDX_52F3404798260155');
            $table->integer('prefecture_id')->nullable()->index('IDX_52F340479D39C865');
            $table->integer('province_id')->nullable()->index('IDX_52F34047E946114A');
            $table->integer('commune_id')->nullable()->index('IDX_52F34047131A4F72');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rule_regions');
    }
}
