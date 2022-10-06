<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinitionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definition_activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('definition_id')->nullable()->index('IDX_F04F75E2D11EA911');
            $table->integer('section_id')->nullable()->index('IDX_F04F75E2D823E37A');
            $table->integer('activity_id')->nullable()->index('IDX_F04F75E281C06096');
            $table->integer('n1_activity_id')->nullable()->index('IDX_F04F75E2E8BA83C3');
            $table->integer('n2_activity_id')->nullable()->index('IDX_F04F75E25570EF0D');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('definition_activities');
    }
}
