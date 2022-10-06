<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('society_id')->nullable()->index('IDX_DD5A5B7DE6389D24');
            $table->integer('user_id')->nullable()->index('IDX_DD5A5B7DA76ED395');
            $table->integer('requirement_id')->nullable()->index('IDX_DD5A5B7D7B576F77');
            $table->string('title');
            $table->longText('content');
            $table->string('type');
            $table->string('status');
            $table->string('criticality');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan');
    }
}
