<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecretTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decret', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('activity_id')->nullable()->index('IDX_4271DAC681C06096');
            $table->integer('bo_id')->nullable()->index('IDX_4271DAC6DF952847');
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
        Schema::dropIfExists('decret');
    }
}
