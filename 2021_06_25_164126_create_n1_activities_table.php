<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateN1ActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n1_activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code');
            $table->string('name');
            $table->integer('section_id')->nullable()->index('IDX_C9D00476D823E37A');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('n1_activities');
    }
}
