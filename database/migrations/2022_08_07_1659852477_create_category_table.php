<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {

		$table->id();
		$table->string('name',250)->nullable();
		$table->integer('courses_id')->nullable();
		$table->datetime('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
		$table->datetime('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
		$table->datetime('deleted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    public function down()
    {
        Schema::dropIfExists('category');
    }
}