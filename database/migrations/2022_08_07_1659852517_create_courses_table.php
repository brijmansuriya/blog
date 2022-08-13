<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

		$table->integer('id',11);
		$table->string('name')->nullable()->default('NULL');
		$table->string('image')->nullable()->default('NULL');
		$table->datetime('created_at')->default('current_timestamp');
		$table->datetime('updated_at')->default('current_timestamp');
		$table->datetime('deleted_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}