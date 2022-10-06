<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSubSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_sectors', function (Blueprint $table) {
            $table->foreign('sector_id', 'FK_CA4C5A6CDE95C867')->references('id')->on('sectors')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_sectors', function (Blueprint $table) {
            $table->dropForeign('FK_CA4C5A6CDE95C867');
        });
    }
}
