<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement', function (Blueprint $table) {
            $table->integer('id', true);
            $table->longText('content');
            $table->date('createdAt');
            $table->date('updateAt');
            $table->integer('text_id')->nullable()->index('IDX_DB3F5550698D3548');
            $table->longText('avis')->nullable();
            $table->integer('updated_by_id')->nullable()->index('IDX_DB3F5550896DBBDE');
            $table->string('status', 20);
            $table->string('reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement');
    }
}
