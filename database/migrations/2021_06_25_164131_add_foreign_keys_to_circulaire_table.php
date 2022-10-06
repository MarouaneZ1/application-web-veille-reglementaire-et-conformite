<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCirculaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circulaire', function (Blueprint $table) {
            $table->foreign('activity_id', 'FK_9ED1C83B81C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('bo_id', 'FK_9ED1C83BDF952847')->references('id')->on('bos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('circulaire', function (Blueprint $table) {
            $table->dropForeign('FK_9ED1C83B81C06096');
            $table->dropForeign('FK_9ED1C83BDF952847');
        });
    }
}
