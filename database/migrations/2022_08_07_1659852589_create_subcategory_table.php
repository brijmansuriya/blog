<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoryTable extends Migration
{
    public function up()
    {
        Schema::create('subcategory', function (Blueprint $table) {

		$table->integer('id',11);
		$table->integer('cid',11)->nullable()->default('NULL');
		$table->integer('courses_id',11)->nullable()->default('NULL');
		$table->string('name',250)->nullable()->default('NULL');
		$table->datetime('created_at')->default('current_timestamp');
		$table->datetime('updated_at')->default('current_timestamp');
		$table->datetime('deleted_at')->default('current_timestamp');

        });
    }

    public function down()
    {
        Schema::dropIfExists('subcategory');
    }
}