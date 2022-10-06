<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrefectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prefecture', function (Blueprint $table) {
            $table->foreign('region_id', 'FK_ABE6511A98260155')->references('id')->on('region')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prefecture', function (Blueprint $table) {
            $table->dropForeign('FK_ABE6511A98260155');
        });
    }
}
