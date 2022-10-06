<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateN2ActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n2_activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('n1_activity_id')->nullable()->index('IDX_BE4ED686E8BA83C3');
            $table->string('code');
            $table->string('name');
            $table->integer('section_id')->nullable()->index('IDX_BE4ED686D823E37A');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('n2_activities');
    }
}
