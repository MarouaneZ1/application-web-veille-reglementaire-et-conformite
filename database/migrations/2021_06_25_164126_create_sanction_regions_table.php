<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_regions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('sanction_id')->nullable()->index('IDX_1E3AEE9696E0C11A');
            $table->integer('region_id')->nullable()->index('IDX_1E3AEE9698260155');
            $table->integer('prefecture_id')->nullable()->index('IDX_1E3AEE969D39C865');
            $table->integer('province_id')->nullable()->index('IDX_1E3AEE96E946114A');
            $table->integer('commune_id')->nullable()->index('IDX_1E3AEE96131A4F72');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanction_regions');
    }
}
