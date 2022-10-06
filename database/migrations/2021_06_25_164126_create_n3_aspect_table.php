<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateN3AspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n3_aspect', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('n2_aspect_id')->nullable()->index('IDX_ED36E1AEFCF63D43');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('n3_aspect');
    }
}
