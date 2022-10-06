<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinitionAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definition_aspects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('theme_id')->nullable()->index('IDX_3582173359027487');
            $table->integer('aspect_id')->nullable()->index('IDX_3582173398507F8C');
            $table->integer('n1_aspect_id')->nullable()->index('IDX_3582173365145B42');
            $table->integer('n2_aspect_id')->nullable()->index('IDX_35821733FCF63D43');
            $table->integer('n3_aspect_id')->nullable()->index('IDX_358217333D78E283');
            $table->integer('definition_id')->nullable()->index('IDX_35821733D11EA911');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('definition_aspects');
    }
}
