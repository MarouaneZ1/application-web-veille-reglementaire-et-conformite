<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->dateTime('date');
            $table->string('file');
            $table->string('day_arabe')->nullable();
            $table->string('mount_arabe')->nullable();
            $table->string('year_arabe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bos');
    }
}
