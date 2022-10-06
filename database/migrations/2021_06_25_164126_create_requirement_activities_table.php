<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('requirement_id')->nullable()->index('IDX_5BC6AAFC7B576F77');
            $table->integer('section_id')->nullable()->index('IDX_5BC6AAFCD823E37A');
            $table->integer('activity_id')->nullable()->index('IDX_5BC6AAFC81C06096');
            $table->integer('n1_activity_id')->nullable()->index('IDX_5BC6AAFCE8BA83C3');
            $table->integer('n2_activity_id')->nullable()->index('IDX_5BC6AAFC5570EF0D');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_activities');
    }
}
