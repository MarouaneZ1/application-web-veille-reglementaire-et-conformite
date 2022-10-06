<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_aspects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('theme_id')->nullable()->index('IDX_5B75C62859027487');
            $table->integer('aspect_id')->nullable()->index('IDX_5B75C62898507F8C');
            $table->integer('n1_aspect_id')->nullable()->index('IDX_5B75C62865145B42');
            $table->integer('n2_aspect_id')->nullable()->index('IDX_5B75C628FCF63D43');
            $table->integer('n3_aspect_id')->nullable()->index('IDX_5B75C6283D78E283');
            $table->integer('requirement_id')->nullable()->index('IDX_5B75C6287B576F77');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_aspects');
    }
}
