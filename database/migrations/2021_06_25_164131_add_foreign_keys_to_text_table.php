<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text', function (Blueprint $table) {
            $table->foreign('category_id', 'FK_3B8BA7C712469DE2')->references('id')->on('category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('commune_id', 'FK_3B8BA7C7131A4F72')->references('id')->on('communes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n3_aspect_id', 'FK_3B8BA7C73D78E283')->references('id')->on('n3_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n2_activity_id', 'FK_3B8BA7C75570EF0D')->references('id')->on('n2_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('abroged_id', 'FK_3B8BA7C755D6BF52')->references('id')->on('text')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('theme_id', 'FK_3B8BA7C759027487')->references('id')->on('themes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_aspect_id', 'FK_3B8BA7C765145B42')->references('id')->on('n1_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('activity_id', 'FK_3B8BA7C781C06096')->references('id')->on('activity')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('region_id', 'FK_3B8BA7C798260155')->references('id')->on('region')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('aspect_id', 'FK_3B8BA7C798507F8C')->references('id')->on('aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prefecture_id', 'FK_3B8BA7C79D39C865')->references('id')->on('prefecture')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('section_id', 'FK_3B8BA7C7D823E37A')->references('id')->on('section')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('bo_id', 'FK_3B8BA7C7DF952847')->references('id')->on('bos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n1_activity_id', 'FK_3B8BA7C7E8BA83C3')->references('id')->on('n1_activities')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('province_id', 'FK_3B8BA7C7E946114A')->references('id')->on('provinces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('n2_aspect_id', 'FK_3B8BA7C7FCF63D43')->references('id')->on('n2_aspect')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text', function (Blueprint $table) {
            $table->dropForeign('FK_3B8BA7C712469DE2');
            $table->dropForeign('FK_3B8BA7C7131A4F72');
            $table->dropForeign('FK_3B8BA7C73D78E283');
            $table->dropForeign('FK_3B8BA7C75570EF0D');
            $table->dropForeign('FK_3B8BA7C755D6BF52');
            $table->dropForeign('FK_3B8BA7C759027487');
            $table->dropForeign('FK_3B8BA7C765145B42');
            $table->dropForeign('FK_3B8BA7C781C06096');
            $table->dropForeign('FK_3B8BA7C798260155');
            $table->dropForeign('FK_3B8BA7C798507F8C');
            $table->dropForeign('FK_3B8BA7C79D39C865');
            $table->dropForeign('FK_3B8BA7C7D823E37A');
            $table->dropForeign('FK_3B8BA7C7DF952847');
            $table->dropForeign('FK_3B8BA7C7E8BA83C3');
            $table->dropForeign('FK_3B8BA7C7E946114A');
            $table->dropForeign('FK_3B8BA7C7FCF63D43');
        });
    }
}
