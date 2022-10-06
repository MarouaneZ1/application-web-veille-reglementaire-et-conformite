<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDecretTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('decret', function (Blueprint $table) {
            $table->foreign('activity_id', 'FK_4271DAC681C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('bo_id', 'FK_4271DAC6DF952847')->references('id')->on('bos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('decret', function (Blueprint $table) {
            $table->dropForeign('FK_4271DAC681C06096');
            $table->dropForeign('FK_4271DAC6DF952847');
        });
    }
}
