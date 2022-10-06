<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement_parameter', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('society_id')->nullable()->index('IDX_13F3A412E6389D24');
            $table->integer('user_id')->nullable()->index('IDX_13F3A412A76ED395');
            $table->integer('requirement_id')->nullable()->index('IDX_13F3A4127B576F77');
            $table->boolean('isApplicable');
            $table->date('date');
            $table->longText('comment');
            $table->longText('criticality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement_parameter');
    }
}
