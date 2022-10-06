<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->boolean('enabled');
            $table->integer('n2_activity_id')->nullable()->index('IDX_AC74095A5570EF0D');
            $table->string('code');
            $table->integer('section_id')->nullable()->index('IDX_AC74095AD823E37A');
            $table->integer('n1_activity_id')->nullable()->index('IDX_AC74095AE8BA83C3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity');
    }
}
