<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleAspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_aspects', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('theme_id')->nullable()->index('IDX_F06BD00759027487');
            $table->integer('aspect_id')->nullable()->index('IDX_F06BD00798507F8C');
            $table->integer('n1_aspect_id')->nullable()->index('IDX_F06BD00765145B42');
            $table->integer('n2_aspect_id')->nullable()->index('IDX_F06BD007FCF63D43');
            $table->integer('n3_aspect_id')->nullable()->index('IDX_F06BD0073D78E283');
            $table->integer('rule_id')->nullable()->index('IDX_F06BD007744E0351');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rule_aspects');
    }
}
