<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateN1AspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n1_aspect', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->integer('theme_id')->nullable()->index('IDX_AF13E6D359027487');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('n1_aspect');
    }
}
