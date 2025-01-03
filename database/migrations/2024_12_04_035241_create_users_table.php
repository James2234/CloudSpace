<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('avatar')->default('')->comment('头像');
            $table->string('nickname')->default('')->comment('昵称');
            $table->string('name')->default('')->comment('姓名');
            $table->string('idcard')->default('')->comment('身份证号');
            $table->string('phonenum')->default('')->comment('手机号');
            $table->string('password')->default('');
            $table->string('remember_token')->nullable();
            $table->timestamps();
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
