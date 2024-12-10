<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publish_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid')->default('')->comment('推荐人ID');
            $table->string('location')->default('')->comment('位置(小区)');
            $table->string('location_detail')->default('')->comment('小区详细地址');
            $table->string('name')->default('');
            $table->string('sex')->default('');
            $table->string('age')->default('');
            $table->string('room_type')->default('')->comment('房型');
            $table->string('budget')->nullable()->comment('预算');
            $table->string('contact')->default('')->comment('联系方式');
            $table->string('contact_detail')->nullable()->comment('联系地址');
            $table->string('note')->nullable()->comment('备注');
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
        Schema::dropIfExists('publish_list');
    }
}
