<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirculaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circulaire', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('activity_id')->nullable()->index('IDX_9ED1C83B81C06096');
            $table->integer('bo_id')->nullable()->index('IDX_9ED1C83BDF952847');
            $table->string('name');
            $table->longText('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circulaire');
    }
}
