<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToN3AspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('n3_aspect', function (Blueprint $table) {
            $table->foreign('n2_aspect_id', 'FK_ED36E1AEFCF63D43')->references('id')->on('n2_aspect')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('n3_aspect', function (Blueprint $table) {
            $table->dropForeign('FK_ED36E1AEFCF63D43');
        });
    }
}
