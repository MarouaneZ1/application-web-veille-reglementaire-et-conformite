<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lois', function (Blueprint $table) {
            $table->foreign('activity_id', 'FK_6E0CEBD281C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('bo_id', 'FK_6E0CEBD2DF952847')->references('id')->on('bos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lois', function (Blueprint $table) {
            $table->dropForeign('FK_6E0CEBD281C06096');
            $table->dropForeign('FK_6E0CEBD2DF952847');
        });
    }
}
