<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryandgameTable extends Migration
{
    public function up()
    {
        Schema::create('storyandgame', function (Blueprint $table) {

		$table->integer('id',11);
		$table->integer('scid',11)->nullable()->default('NULL');
		$table->integer('courses_id',11)->nullable()->default('NULL');
		$table->integer('cid',11)->nullable()->default('NULL');
		$table->string('name')->nullable()->default('NULL');
		$table->datetime('created_at')->default('current_timestamp');
		$table->datetime('updated_at')->default('current_timestamp');
		$table->integer('deleted_at',11)->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('storyandgame');
    }
}