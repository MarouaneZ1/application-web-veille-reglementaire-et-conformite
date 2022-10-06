<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username', 180);
            $table->string('username_canonical', 180)->unique('UNIQ_1483A5E992FC23A8');
            $table->string('email', 180);
            $table->string('email_canonical', 180)->unique('UNIQ_1483A5E9A0D96FBF');
            $table->boolean('enabled');
            $table->string('salt')->nullable();
            $table->string('password');
            $table->dateTime('last_login')->nullable();
            $table->string('confirmation_token', 180)->nullable()->unique('UNIQ_1483A5E9C05FB297');
            $table->dateTime('password_requested_at')->nullable();
            $table->array('roles');
            $table->string('profile')->nullable();
            $table->integer('society_id')->nullable()->index('IDX_1483A5E9E6389D24');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
