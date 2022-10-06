<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('society_id')->nullable()->index('IDX_BC00AA63E6389D24');
            $table->string('name');
            $table->integer('prefecture_id')->nullable()->index('IDX_BC00AA639D39C865');
            $table->integer('region_id')->nullable()->index('IDX_BC00AA6398260155');
            $table->boolean('principal');
            $table->string('contact_name');
            $table->string('contact_tel');
            $table->string('contact_mail');
            $table->string('contact_function');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
