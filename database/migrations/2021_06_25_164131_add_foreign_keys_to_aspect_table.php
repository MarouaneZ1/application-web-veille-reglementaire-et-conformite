<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aspect', function (Blueprint $table) {
            $table->foreign('n3_aspect_id', 'FK_F083C3553D78E283')->references('id')->on('n3_aspect')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aspect', function (Blueprint $table) {
            $table->dropForeign('FK_F083C3553D78E283');
        });
    }
}
