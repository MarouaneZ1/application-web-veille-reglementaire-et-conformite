<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_aspects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('theme_id')->nullable()->index('IDX_245EC68C59027487');
            $table->integer('aspect_id')->nullable()->index('IDX_245EC68C98507F8C');
            $table->integer('n1_aspect_id')->nullable()->index('IDX_245EC68C65145B42');
            $table->integer('n2_aspect_id')->nullable()->index('IDX_245EC68CFCF63D43');
            $table->integer('n3_aspect_id')->nullable()->index('IDX_245EC68C3D78E283');
            $table->integer('text_id')->nullable()->index('IDX_245EC68C698D3548');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_aspects');
    }
}
