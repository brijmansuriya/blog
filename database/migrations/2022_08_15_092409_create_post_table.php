<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->text('body')->nullable();
            $table->text('keywords')->nullable();
            $table->text('metadescription')->nullable();
            $table->integer('created_at')->nullable()->default(1);
            $table->integer('created_by')->default(1);
            $table->integer('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
