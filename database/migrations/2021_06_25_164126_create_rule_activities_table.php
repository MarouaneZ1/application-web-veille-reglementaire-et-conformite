<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('rule_id')->nullable()->index('IDX_8E40233E744E0351');
            $table->integer('section_id')->nullable()->index('IDX_8E40233ED823E37A');
            $table->integer('activity_id')->nullable()->index('IDX_8E40233E81C06096');
            $table->integer('n1_activity_id')->nullable()->index('IDX_8E40233EE8BA83C3');
            $table->integer('n2_activity_id')->nullable()->index('IDX_8E40233E5570EF0D');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rule_activities');
    }
}
