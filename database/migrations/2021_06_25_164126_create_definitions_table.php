<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definitions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('text_id')->nullable()->index('IDX_936EA5C2698D3548');
            $table->integer('updated_by_id')->nullable()->index('IDX_936EA5C2896DBBDE');
            $table->longText('content');
            $table->longText('avis')->nullable();
            $table->date('createdAt');
            $table->date('updateAt');
            $table->string('status', 20);
            $table->string('reference');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('definitions');
    }
}
