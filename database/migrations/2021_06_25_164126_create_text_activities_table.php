<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('text_id')->nullable()->index('IDX_290BA67F698D3548');
            $table->integer('section_id')->nullable()->index('IDX_290BA67FD823E37A');
            $table->integer('activity_id')->nullable()->index('IDX_290BA67F81C06096');
            $table->integer('n1_activity_id')->nullable()->index('IDX_290BA67FE8BA83C3');
            $table->integer('n2_activity_id')->nullable()->index('IDX_290BA67F5570EF0D');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_activities');
    }
}
