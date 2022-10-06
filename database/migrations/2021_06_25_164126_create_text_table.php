<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id')->nullable()->index('IDX_3B8BA7C712469DE2');
            $table->integer('bo_id')->nullable()->index('IDX_3B8BA7C7DF952847');
            $table->string('name');
            $table->longText('description');
            $table->dateTime('date')->nullable();
            $table->string('state', 20);
            $table->dateTime('createdAt');
            $table->dateTime('updateAt');
            $table->string('day_arabe')->nullable();
            $table->string('mount_arabe')->nullable();
            $table->string('year_arabe')->nullable();
            $table->integer('abroged_id')->nullable()->index('IDX_3B8BA7C755D6BF52');
            $table->dateTime('abroged_date')->nullable();
            $table->string('dahir')->nullable();
            $table->integer('region_id')->nullable()->index('IDX_3B8BA7C798260155');
            $table->integer('prefecture_id')->nullable()->index('IDX_3B8BA7C79D39C865');
            $table->integer('province_id')->nullable()->index('IDX_3B8BA7C7E946114A');
            $table->integer('commune_id')->nullable()->index('IDX_3B8BA7C7131A4F72');
            $table->integer('theme_id')->nullable()->index('IDX_3B8BA7C759027487');
            $table->integer('aspect_id')->nullable()->index('IDX_3B8BA7C798507F8C');
            $table->integer('n1_aspect_id')->nullable()->index('IDX_3B8BA7C765145B42');
            $table->integer('n2_aspect_id')->nullable()->index('IDX_3B8BA7C7FCF63D43');
            $table->integer('n3_aspect_id')->nullable()->index('IDX_3B8BA7C73D78E283');
            $table->integer('section_id')->nullable()->index('IDX_3B8BA7C7D823E37A');
            $table->integer('activity_id')->nullable()->index('IDX_3B8BA7C781C06096');
            $table->integer('n1_activity_id')->nullable()->index('IDX_3B8BA7C7E8BA83C3');
            $table->integer('n2_activity_id')->nullable()->index('IDX_3B8BA7C75570EF0D');
            $table->dateTime('date_publication')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text');
    }
}
