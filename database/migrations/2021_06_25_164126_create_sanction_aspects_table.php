<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_aspects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('theme_id')->nullable()->index('IDX_BCA27ED659027487');
            $table->integer('aspect_id')->nullable()->index('IDX_BCA27ED698507F8C');
            $table->integer('n1_aspect_id')->nullable()->index('IDX_BCA27ED665145B42');
            $table->integer('n2_aspect_id')->nullable()->index('IDX_BCA27ED6FCF63D43');
            $table->integer('n3_aspect_id')->nullable()->index('IDX_BCA27ED63D78E283');
            $table->integer('sanction_id')->nullable()->index('IDX_BCA27ED696E0C11A');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanction_aspects');
    }
}
