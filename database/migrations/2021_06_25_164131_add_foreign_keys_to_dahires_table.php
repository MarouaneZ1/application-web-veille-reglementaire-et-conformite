<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDahiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dahires', function (Blueprint $table) {
            $table->foreign('activity_id', 'FK_48A2EC2881C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('bo_id', 'FK_48A2EC28DF952847')->references('id')->on('bos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dahires', function (Blueprint $table) {
            $table->dropForeign('FK_48A2EC2881C06096');
            $table->dropForeign('FK_48A2EC28DF952847');
        });
    }
}
