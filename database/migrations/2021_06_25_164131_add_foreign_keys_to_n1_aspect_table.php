<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToN1AspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('n1_aspect', function (Blueprint $table) {
            $table->foreign('theme_id', 'FK_AF13E6D359027487')->references('id')->on('themes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('n1_aspect', function (Blueprint $table) {
            $table->dropForeign('FK_AF13E6D359027487');
        });
    }
}
