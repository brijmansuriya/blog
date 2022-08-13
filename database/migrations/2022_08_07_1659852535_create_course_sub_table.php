<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSubTable extends Migration
{
    public function up()
    {
        Schema::create('course_sub', function (Blueprint $table) {

		$table->integer('id',11);
		$table->integer('course_id',11)->nullable()->default('NULL');
		$table->integer('cid',11)->nullable()->default('NULL');
		$table->integer('scid',11)->nullable()->default('NULL');
		$table->integer('gsid',11)->nullable()->default('NULL');
		$table->text('url')->nullable()->default('NULL');
		$table->datetime('created_at')->default('current_timestamp');
		$table->datetime('updated_at')->default('current_timestamp');
		$table->datetime('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('course_sub');
    }
}