<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDahiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dahires', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('activity_id')->nullable()->index('IDX_48A2EC2881C06096');
            $table->integer('bo_id')->nullable()->index('IDX_48A2EC28DF952847');
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
        Schema::dropIfExists('dahires');
    }
}
