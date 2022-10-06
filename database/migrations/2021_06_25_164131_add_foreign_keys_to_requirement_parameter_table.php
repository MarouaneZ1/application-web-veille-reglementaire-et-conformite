<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRequirementParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requirement_parameter', function (Blueprint $table) {
            $table->foreign('requirement_id', 'FK_13F3A4127B576F77')->references('id')->on('requirement')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('user_id', 'FK_13F3A412A76ED395')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('society_id', 'FK_13F3A412E6389D24')->references('id')->on('societies')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requirement_parameter', function (Blueprint $table) {
            $table->dropForeign('FK_13F3A4127B576F77');
            $table->dropForeign('FK_13F3A412A76ED395');
            $table->dropForeign('FK_13F3A412E6389D24');
        });
    }
}
